<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingMail extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'incoming_mail_number',
        'incoming_mail_date',
        'letter_category_id',
        'incoming_mail_sender',
        'incoming_mail_subject',
        'incoming_mail_file',
        'incoming_mail_addressed_to',
    ];

    public function setIncomingMailSenderAttribute($value)
    {
        $this->attributes['incoming_mail_sender'] = ucwords($value);
    }
    public function setIncomingMailSubjectAttribute($value)
    {
        $this->attributes['incoming_mail_subject'] = ucwords($value);
    }
    public function setIncomingMailAddressedToAttribute($value)
    {
        $this->attributes['incoming_mail_addressed_to'] = ucwords($value);
    }

    public function letterCategory(){
        return $this->belongsTo(LetterCategory::class);
    }
}
