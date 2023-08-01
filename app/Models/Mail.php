<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use CrudTrait;
    use HasFactory;
    
    protected $fillable = [
        'mail_number',
        'mail_date',
        'letter_category_id',
        'mail_sender',
        'mail_subject',
        'mail_file',
        'mail_addressed_to',
    ];

    public function setMailSenderAttribute($value)
    {
        $this->attributes['mail_sender'] = ucwords($value);
    }
    public function setMailSubjectAttribute($value)
    {
        $this->attributes['mail_subject'] = ucwords($value);
    }
    public function setMailAddressedToAttribute($value)
    {
        $this->attributes['mail_addressed_to'] = ucwords($value);
    }

    public function letterCategory(){
        return $this->belongsTo(LetterCategory::class);
    }

    public function createOutcomingMailBtn()
    {
        return '<a class="btn btn-secondary" href="'.route('mail.create',['sender' => env('SCHOOL_NAME')]).'" data-toggle="tooltip" title="Add outcoming mail"><i class="la la-plus"></i> Add outcoming mail</a>';
    }
}
