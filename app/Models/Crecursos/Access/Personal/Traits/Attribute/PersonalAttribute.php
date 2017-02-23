<?php

namespace App\Models\Crecursos\Access\Personal\Traits\Attribute;

/**
 * Class PersonalAttribute
 * @package App\Models\Access\Personal\Traits\Attribute
 */

trait PersonalAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
      return '<a href="' . route('crecursos.access.personal.edit', $this) . '" class="btn btn-xs btn-primary informe"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
      return '<a href="' . route('crecursos.access.personal.destroy', $this) . '"
        data-method="delete"
        data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
        data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
        data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
        class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
      return '<a href="' . route('crecursos.access.personal.restore', $this) . '" name="restore_personal" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.Personals.restore_Personal') . '"></i></a> ';
    }
    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
      return '<a href="' . route('crecursos.access.personal.delete-permanently', $this) . '" name="delete_Personal_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.Personals.delete_permanently') . '"></i></a> ';
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