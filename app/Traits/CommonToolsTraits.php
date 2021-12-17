<?php

namespace App\Traits;

trait CommonToolsTraits {

    // ----------------------------------------------------------------------
    //  make options for select2
    // ----------------------------------------------------------------------
    private function initSelect2Options($collection)
    {
        $options = collect();
        $options->push([
            'id'    => ' ',
            'text'  => __('label.empty_value'),
        ]);
        $collection->map(function ($item, $key) use ($options) {
            return $options->push([
                'id'    => $key,
                'text'  => $item,
            ]);
        });
        return $options;
    }

}