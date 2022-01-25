<?php


namespace App\Http;


class ImageUpload
{
    /*
            Get uploade photo
        */
    public static function upload_image($photo, $path)
    {
        $extension = $photo->getClientOriginalExtension();
        $image_name = time() . '.' . $extension;
        $photo->storeAs($path, $image_name,'public');
        return $image_name;
    }

    public static function uploade_video($video, $path)
    {
        $extension = $video->getClientOriginalExtension();
        $video_name = time() . '.' . $extension;
        $video->storeAs($path, $video_name,'public');
        return $video_name;
    }

}
