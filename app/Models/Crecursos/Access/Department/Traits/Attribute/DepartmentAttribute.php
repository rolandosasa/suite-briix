<?php

namespace App\Models\Crecursos\Access\Department\Traits\Attribute;

/**
* Class DepartmentAttribute
* @package App\Models\Access\Department\Traits\Attribute
*/
trait DepartmentAttribute
{
  /**
   * @return string
   */
  public function getEditButtonAttribute()
  {
    return '<a href="' . route('crecursos.access.department.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
  }

  /**
   * @return string
   */
  public function getDeleteButtonAttribute()
  {
    return '<a href="' . route('crecursos.access.department.destroy', $this) . '"
      data-method="delete" data-trans-button-cancel="' . trans('buttons.general.cancel') . '"data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a> ';
  }

  /**
   * @return string
   */
  public function getActionButtonsAttribute()
  {
    return $this->getEditButtonAttribute() .
      $this->getDeleteButtonAttribute();
  }
}