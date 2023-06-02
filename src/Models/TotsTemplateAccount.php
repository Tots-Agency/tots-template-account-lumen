<?php

namespace Tots\TemplatesAccount\Models;

use Illuminate\Database\Eloquent\Model;
use Tots\Account\Models\TotsAccount;
use Tots\Templates\Models\TotsTemplate;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $template_id Description for variable
 * @property mixed $account_id Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="template_id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="account_id",
 *  type="integer",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class TotsTemplateAccount extends Model
{
    protected $table = 'tots_template_account';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function account()
    {
        return $this->belongsTo(TotsAccount::class, 'account_id');
    }
    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function template()
    {
        return $this->belongsTo(TotsTemplate::class, 'template_id');
    }


    
}