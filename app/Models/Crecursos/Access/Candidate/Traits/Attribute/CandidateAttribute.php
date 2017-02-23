<?php

namespace App\Models\Crecursos\Access\Candidate\Traits\Attribute;

/**
 * Class CandidateAttribute
 * @package App\Models\Crecursos\Access\Candidate\Traits\Attribute
 */
trait CandidateAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('crecursos.access.candidate.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {

        //Can't delete master crecursos Candidate
        if ($this->id != 1) {
            return '<a href="' . route('crecursos.access.candidate.destroy', $this) . '"
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
         return '<a href="' . route('crecursos.access.candidate.restore', $this) . '" name="restore_Candidate" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.Candidate.restore_Candidate') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('crecursos.access.candidate.delete-permanently', $this) . '" name="delete_Candidate_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.Candidate.delete_permanently') . '"></i></a> ';
    }

   

    /**
     * @return string
     */
    public function getValidationButtonAttribute()
    {
             return '<a href="' . route('crecursos.access.candidate.validation', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.validation') . '"></i></a> ';
    }

    public function getActionButtonsAttribute()
    {
        if ($this->deleted_at) {
            return $this->getRestoreButtonAttribute() .
                $this->getDeletePermanentlyButtonAttribute();
        }

        return $this->getEditButtonAttribute() .
        $this->getDeleteButtonAttribute() .
        $this->getValidationButtonAttribute();
    }
}