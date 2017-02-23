<?php

namespace App\Models\Crecursos\Access\Project\Traits\Attribute;

/**
* Class ProjectAttribute
* @package App\Models\Access\Project\Traits\Attribute
*/
trait ProjectAttribute
{
  /**
   * @return string
   */
  public function getEditButtonAttribute()
  {
    return '<a href="' . route('crecursos.access.project.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
  }

  /**
   * @return string
   */
  public function getDeletePermanentlyButtonAttribute()
  {
    return '<a href="' . route('crecursos.access.project.delete-permanently', $this) . '" name="delete_project" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.crecursos.access.project.delete_permanently') . '"></i></a> ';
  }

  public function getConceptsButtonAttribute()
  {
    return '<a href="' . route('crecursos.access.concept.concepts_plan', $this) . '" class="btn btn-xs bg-navy"><i class="fa fa-calendar" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.crecursos.access.project.view_concept') . '"></i></a> ';
  }

  /**
   * @return string
   */
  public function getActionButtonsAttribute()
  {
    return $this->getConceptsButtonAttribute() . 
      $this->getEditButtonAttribute() .
      $this->getDeletePermanentlyButtonAttribute();
  }
}