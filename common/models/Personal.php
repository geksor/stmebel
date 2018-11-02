<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string $image
 * @property int $publish
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['publish'], 'integer'],
            [['name', 'position', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'position' => 'Должность',
            'image' => 'Фото',
            'publish' => 'Публикация',
        ];
    }

    /**
     * @param $fileName
     * @return bool
     */
    public function savePhoto($fileName)
    {
        $this->image = $fileName;

        return $this->save(false);
    }

    /**
     * @param $folder
     * @return array
     */
    public function getPhotos($folder)
    {
        return [
            'image' => ($this->image) ? '/uploads/images/' . $folder . '/' . $this->image : '/no_photo.png',
            'thumb_image' => ($this->image) ? '/uploads/images/' . $folder . '/' . 'thumb_' . $this->image : '/no_photo.png',
        ];
    }

    /**
     * @throws \yii\base\Exception
     */
    public function deletePhoto()
    {
        $imageUploadModel = new ImageUpload();

        $imageUploadModel->deleteCurrentImage($this->image);
    }

    /**
     * @return bool
     * @throws \yii\base\Exception
     */
    public function beforeDelete()
    {
        $this->deletePhoto();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

}
