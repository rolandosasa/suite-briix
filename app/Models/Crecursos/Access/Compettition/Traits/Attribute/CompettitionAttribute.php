<?php

namespace App\Models\Crecursos\Access\Compettition\Traits\Attribute;

/**
 * Class CompettitionAttribute
 * @package App\Models\Crecursos\Access\Compettition\Traits\Attribute
 */
trait CompettitionAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('crecursos.access.compettition.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {

        //Can't delete master crecursos Compettition
        if ($this->id != 1) {
            return '<a href="' . route('crecursos.access.compettition.destroy', $this) . '"
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
         return '<a href="' . route('crecursos.access.compettition.restore', $this) . '" name="restore_Compettition" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.Compettition.restore_Compettition') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('crecursos.access.compettition.delete-permanently', $this) . '" name="delete_Compettition_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.Compettition.delete_permanently') . '"></i></a> ';
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