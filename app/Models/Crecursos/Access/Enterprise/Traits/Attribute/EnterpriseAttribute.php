<?php

namespace App\Models\Crecursos\Access\Enterprise\Traits\Attribute;

/**
* Class EnterpriseAttribute
* @package App\Models\Access\Enterprise\Traits\Attribute
*/
trait EnterpriseAttribute
{
  /**
   * @return string
   */
  public function getEditButtonAttribute()
  {
    return '<a href="' . route('crecursos.access.enterprise.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
  }

  /**
   * @return string
   */
  public function getDeletePermanentlyButtonAttribute()
  {
    return '<a href="' . route('crecursos.access.enterprise.delete-permanently', $this) . '" name="delete_enterprise" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.enterprise.delete_permanently') . '"></i></a> ';
  }

  /**
   * @return string
   */
  public function getActionButtonsAttribute()
  {
    return $this->getEditButtonAttribute() .
      $this->getDeletePermanentlyButtonAttribute();
  }
}