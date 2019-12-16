<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    const Name=0;
    const Phone1=0;
    const email=0;
    const problem=0;
    const address=0;
    const city=0;
    const state=0;
    
    public function rules()
    {
        return [
            // [['file'], 'file'],
            // [['file'], 'file', 'mimeTypes'=>'text/csv'],// text/csv
            [['file'], 'file', 'maxSize'=>'100000'],
        ];
    }
}