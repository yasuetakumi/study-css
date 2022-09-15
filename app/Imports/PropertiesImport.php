<?php

namespace App\Imports;

use App\Models\City;
use App\Models\User;
use App\Models\Cuisine;
use App\Models\Postcode;
use App\Models\Property;
use App\Models\Structure;
use App\Models\Prefecture;
use App\Models\BusinessTerm;
use App\Models\PropertyType;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\PropertyPublicationStatus;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PropertiesImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // initialize column that need to be converted to id
        $userId = null;
        $postcodeId = null;
        $prefectureId = null;
        $cityId = null;
        $publicationStatusId = null;
        $propertyTypeId = null;
        $structureId = null;
        $businessTermId = null;
        $cuisineId = null;

        // get each id by parent table
        $getUser = User::where('display_name', $row['担当者'])->first();
        $getPostcode = Postcode::where('postcode', $row['郵便番号(optional)'])->first();
        $getPrefecture = Prefecture::where('display_name', $row['都道府県'])->first();
        $getCity = City::where('display_name', $row['市町村区'])->first();
        $getPublicationStatus = PropertyPublicationStatus::where('label_jp', $row['公開状況'])->first();
        $getPropertyType = PropertyType::where('label_jp', $row['飲食店の種類'])->first();
        $getStructure = Structure::where('label_jp', $row['構造'])->first();
        $getBusinessTerms = BusinessTerm::where('label_jp', $row['取引態様'])->first();
        $getCuisine = Cuisine::where('label_jp', $row['業態'])->first();

        if(!empty($getUser)) {
            $userId = $getUser->id;
        }
        if(!empty($getPostcode)) {
            $postcodeId = $getPostcode->id;
        }
        if(!empty($getPrefecture)) {
            $prefectureId = $getPrefecture->id;
        }
        if(!empty($getCity)) {
            $cityId = $getCity->id;
        }
        if(!empty($getPublicationStatus)) {
            $publicationStatusId = $getPublicationStatus->id;
        }
        if(!empty($getPropertyType)) {
            $propertyTypeId = $getPropertyType->id;
        }
        if(!empty($getStructure)) {
            $structureId = $getStructure->id;
        }
        if(!empty($getBusinessTerms)) {
            $businessTermId = $getBusinessTerms->id;
        }
        if(!empty($getCuisine)) {
            $cuisineId = $getCuisine->id;
        }

        return new Property([
            'user_id' => $userId,
            'postcode_id' => $postcodeId,
            'prefecture_id' => $prefectureId,
            'city_id' => $cityId,
            'location' => $row['その他住所（町名・番地・建物名）'] ?? null,
            'publication_status_id' => $publicationStatusId,
            'publication_date' => $publicationStatusId == PropertyPublicationStatus::ID_PUBLISHED || PropertyPublicationStatus::ID_LIMITED_PUBLISHED ? date('Y-m-d') : null,
            'surface_area' => $row['面積(坪)'] ? fromTsubo($row['面積(坪)']) : null,
            'rent_amount' => $row['賃料(円)'] ?? null,
            'number_of_floors_under_ground' => $row['階数(地上)'] ?? null,
            'number_of_floors_above_ground' => $row['階数(地下)'] ?? null,
            'property_type_id' => $propertyTypeId,
            'structure_id' => $structureId,
            'deposit_amount' => $row['保証金または敷金'] ?? null,
            'monthly_maintainance_fee' => $row['権利金または礼金'] ?? null,
            'repayment' => $row['解約時の償却情報'] ?? null,
            'date_built' => $row['築年'] ?? null,
            'renewal_fee' => $row['更新料'] ?? null,
            'contract_length_in_months' => $row['契約期間'] ?? null,
            'special_moving_fee' => $row['造作譲渡料'] ?? null,
            'business_terms_id' => $businessTermId,
            'comment' => $row['備考'] ?? null,
            'is_skeleton' => $row['スケルトン物件 or 居抜き物件'] == Property::SKELETON_JP_LABEL ? true : false,
            'cuisine_id' => $cuisineId,
            'interior_transfer_price' => $row['居抜き譲渡額'] ?? null,
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'delimiter' => ","
        ];
    }

    public function rules(): array
    {
        return [
            '担当者' => ['required', Rule::in(User::pluck('display_name')->toArray())], // user_id
            '郵便番号(optional)' => ['required', Rule::in(Postcode::pluck('postcode')->toArray())], // postcode_id
            '都道府県' => ['required', Rule::in(Prefecture::pluck('display_name')->toArray())], // prefecture_id
            '市町村区' => ['required', Rule::in(City::pluck('display_name')->toArray())], // city_id
            'その他住所（町名・番地・建物名）' => ['required'], // location
            '公開状況' => ['required', Rule::in(PropertyPublicationStatus::pluck('label_jp')->toArray())], // publication_status_id
            '面積(坪)' => ['required', 'numeric'], // surface_area
            '賃料(円)' => ['required', 'numeric'], // rent_amount
            '階数(地上)' => ['nullable', 'numeric'], // number_of_floors_under_ground
            '階数(地下)' => ['nullable', 'numeric'], // number_of_floors_above_ground
            '飲食店の種類' => ['nullable', Rule::in(PropertyType::pluck('label_jp')->toArray())], // property_type_id
            '構造' => ['nullable', Rule::in(Structure::pluck('label_jp')->toArray())], // structure_id
            '保証金または敷金' => ['nullable', 'numeric'], // deposit_amount
            '権利金または礼金' => ['nullable', 'numeric'], // monthly_maintainance_fee
            '築年' => ['nullable', 'date_format:Y-m-d'], // date_built
            '契約期間' => ['nullable', 'numeric'], // contract_length_in_months
            '造作譲渡料' => ['nullable', 'numeric'], // special_moving_fee
            '取引態様' => ['nullable', Rule::in(BusinessTerm::pluck('label_jp')->toArray())], // business_terms_id
            'スケルトン物件 or 居抜き物件' => ['nullable', Rule::in([Property::SKELETON_JP_LABEL, Property::FURNISHED_JP_LABEL])], // is_skeleton
            '業態' => ['nullable', Rule::in(Cuisine::pluck('label_jp')->toArray())], // cuisine_id
            '居抜き譲渡額' => ['nullable', 'numeric'], // interior_transfer_price
        ];
    }
}
