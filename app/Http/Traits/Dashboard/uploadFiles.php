<?php


namespace App\Http\Traits\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait uploadFiles
{
    private $related_images = [];

    /**
     * Upload project images with image method
     * $model => you want model
     * $input => file input name
     * $path => uploaded image path
     * $filepath => upload files path
     * $size => image size
     *
     * @param Request $request
     * @param $model
     * @param string $input
     * @param string $path
     * @param string $filePath
     * @param array $size
     * @param int $counter
     * @return string
     */
    public function uploadImage($request, $model, $input, $path, $filePath, $size, $counter = null)
    {
        if ($request->hasfile($input)) {

            if ($model->image != null) {
                File::delete($path);
            }

            $FileName = time() . $counter . '.' . $request->file($input)->getClientOriginalExtension();

            if (!file_exists($filePath)) {
                mkdir($filePath);
            }
            chmod($filePath, 0777);
            $path = public_path($filePath . '/' . $FileName);

            Image::make($request->file($input)->getRealPath())->resize($size['width'], $size['height'])->save($path);
        } else {
            $FileName = $model->image;
        }

        return $FileName;
    }


    public function uploadImage2($request, $model, $input, $path, $filePath, $size,$sizeSmall, $counter = null)
    {
        if ($request->hasfile($input)) {

            if ($model->image != null) {
                File::delete($path);
            }
            $FileName = time() . random_int(10000, 99999). $counter  ;

            if (!file_exists($filePath)) {
                mkdir($filePath);
            }
            chmod($filePath, 0777);
            $path = public_path($filePath . '/' . $FileName. '.'. $request->file($input)->getClientOriginalExtension());
            $path1 = public_path($filePath . '/' . $FileName.'-thumbnail'. '.'. $request->file($input)->getClientOriginalExtension());
            Image::make($request->file($input)->getRealPath())->resize($size['width'], $size['height'])->save($path);
            Image::make($request->file($input)->getRealPath())->resize($sizeSmall['width'], $sizeSmall['height'])->save($path1);
            $FileName = $FileName.'.'. $request->file($input)->getClientOriginalExtension();
        } else {
            $FileName = $request->image;
        }

        return $FileName;
    }

    /**
     * Upload project images with image method
     * $model => you want model
     * $input => file input name
     * $path => uploaded image path
     * $filepath => upload files path
     * $size => image size
     *
     * @param $request
     * @param $model
     * @param $input
     * @param $path
     * @param $filePath
     * @param $size
     * @return string
     */
    public function uploadVideo($request, $model, $input, $path, $filePath)
    {
        if ($request->hasfile($input)) {

            if ($model->video != null) {
                File::delete($path);
            }

            $FileName = time() . '.' . $request->file($input)->getClientOriginalExtension();

            if (!file_exists($filePath)) {
                mkdir($filePath);
            }
            chmod($filePath, 0777);
            $request->file('video')->move(public_path($filePath . '/' . $FileName), $FileName);
        } else {
            $FileName = $model->image;
        }

        return $FileName;
    }

    public function multiImage($images, $model, $filePath, $size)
    {
        if ($images != []) {

            if (!$model->related_image == []) {
                $this->related_images = $model->related_image;
            }
            $i = 1;
            foreach ($images as $image) {
                foreach ($image as $item) {
                    $FilesName = time() + $i . '.' . $item->getClientOriginalExtension();
                }

                if (!file_exists($filePath)) {
                    mkdir($filePath);
                }
                chmod($filePath, 0777);
                $path = public_path($filePath . '/' . $FilesName);
                Image::make($item->getRealPath())->resize($size['width'], $size['height'])->save($path);

                array_push($this->related_images, $FilesName);
                $i++;
            }
        }
        return json_encode($this->related_images);
    }
}
