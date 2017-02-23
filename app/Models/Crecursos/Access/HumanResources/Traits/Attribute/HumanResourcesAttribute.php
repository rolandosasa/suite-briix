<?php

namespace App\Models\Crecursos\Access\HumanResources\Traits\Attribute;

/**
 * Class HumanResourcesAttribute
 * @package App\Models\Access\HumanResources\Traits\Attribute
 */
trait HumanResourcesAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('crecursos.access.humanresources.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {

        //Can't delete master crecursos HumanResources
        if ($this->id != 1) {
            return '<a href="' . route('crecursos.access.humanresources.destroy', $this) . '"
                 data-method="delete"
                 data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                 data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                 class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
         return '<a href="' . route('crecursos.access.humanresources.restore', $this) . '" name="restore_HumanResources" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.HumanResources.restore_HumanResources') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('crecursos.access.humanresources.delete-permanently', $this) . '" name="delete_HumanResources_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.HumanResources.delete_permanently') . '"></i></a> ';
    }

   

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->deleted_at) {
            return $this->getRestoreButtonAttribute() .
                $this->getDeletePermanentlyButtonAttribute();
        }

        return $this->getEditButtonAttribute() .
        $this->getDeleteButtonAttribute();
    }
}