<?php

namespace App\Models\Crecursos\Access\Job\Traits\Attribute;

/**
 * Class jobAttribute
 * @package App\Models\Crecursos\Access\Job\Traits\Attribute
 */
trait JobAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('crecursos.access.job.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {

        //Can't delete master crecursos job
        if ($this->id != 1) {
            return '<a href="' . route('crecursos.access.job.destroy', $this) . '"
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
         return '<a href="' . route('crecursos.access.job.restore', $this) . '" name="restore_job" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.job.restore_job') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('crecursos.access.job.delete-permanently', $this) . '" name="delete_job_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.job.delete_permanently') . '"></i></a> ';
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