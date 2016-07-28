<?php namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageFactory {

    protected $image;
    protected $file;
    protected $previousPath;
    protected $path;
    protected $filename;
    protected $fileext;
    protected $thumbx;
    protected $thumby;
    protected $largex;
    protected $largey;
    protected $saveName;

    public function podTypeImageSetup($file, $podId)
    {
        // Thumb X - Y, Large X - Y
        $this->setSizes(300, 300, 800, 800);
        $this->file = $file;
        $this->path = public_path('images/pod-types/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
//        $this->thumbnail($productCode);
        $this->thumbWidthKeepAspect($podId);
        $this->largeWidthKeepAspect($podId);
//        $this->large($productCode);
        $this->saveName = $podId.'.'.$this->fileext;
        return $this->saveName;
    }

    public function categoryImageSetup($file, $categorySlug)
    {
        // Thumb X - Y, Large X - Y
        $this->setSizes(300, 300, 600, 600);
        $this->file = $file;
        $this->path = public_path('assets/images/categories/uploads/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
//        $this->thumbnail($categorySlug);
        $this->thumbHeightKeepAspect($categorySlug);
        $this->largeHeightKeepAspect($categorySlug);
        $this->saveName = $categorySlug.'.'.$this->fileext;
        return $this->saveName;
    }

    public function productMakeImageSetup($file, $fileName)
    {
        // Thumb X - Y, Large X - Y
        $this->setSizes(300, 70, 600, 150);
        $this->file = $file;
        $this->path = public_path('assets/images/logos/uploads/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
//        $this->thumbnail($fileName);
        $this->thumbHeightKeepAspect($fileName);
        $this->largeHeightKeepAspect($fileName);
//        $this->large($categorySlug);
//        $this->asIs('large-'.$fileName);
        $this->saveName = $fileName.'.'.$this->fileext;
        return $this->saveName;
    }

    public function bannerImageSetup($file, $fileName)
    {
        // Thumb X - Y, Large X - Y
//        $this->setSizes(300, 300, 600, 600);
        $this->file = $file;
        $this->path = public_path('assets/images/banners/uploads/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
        $this->asIs($fileName);//(1920 x 462)

//        $this->thumbnail($fileName);
//        $this->large($fileName);
        $this->saveName = $fileName.'.'.$this->fileext;
        return $this->saveName;
    }

    public function blogImageSetup($file, $fileName)
    {
        // Thumb X - Y, Large X - Y
//        $this->setSizes(300, 300, 600, 600);
        $this->file = $file;
        $this->path = public_path('assets/images/posts/uploads/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
        $this->asIs($fileName);//(1920 x 462)

//        $this->thumbnail($fileName);
//        $this->large($fileName);
        $this->saveName = $fileName.'.'.$this->fileext;
        return $this->saveName;
    }

    public function competitionImageSetup($file, $fileName)
    {
        // Thumb X - Y, Large X - Y
        $this->setSizes(300, 300, 900, 900);
        $this->file = $file;
        $this->path = public_path('assets/images/competitions/uploads/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
//        $this->asIs($fileName);
        $this->largeWidthKeepAspect($fileName);

//        $this->thumbnail($fileName);
//        $this->large($fileName);
        $this->saveName = $fileName.'.'.$this->fileext;
        return $this->saveName;
    }

    public function careeRSetup($file, $fileName)
    {
        // Thumb X - Y, Large X - Y
//        $this->setSizes(300, 300, 600, 600);
        $this->file = $file;
        $this->path = public_path('assets/images/competitions/uploads/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
        $this->asIs($fileName);

//        $this->thumbnail($fileName);
//        $this->large($fileName);
        $this->saveName = $fileName.'.'.$this->fileext;
        return $this->saveName;
    }

    public function applicationImageSetup($file, $fileName)
    {
        // Thumb X - Y, Large X - Y
//        $this->setSizes(300, 300, 600, 600);
        $this->file = $file;
        $this->path = public_path('assets/applications/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
        $this->asIs($fileName);

//        $this->thumbnail($fileName);
//        $this->large($fileName);
        $this->saveName = $fileName.'.'.$this->fileext;
        return $this->saveName;
    }

    public function testimonialImageSetup($file, $full_name)
    {
        // Thumb X - Y, Large X - Y
        $this->setSizes(300, 300, 600, 600);
        $this->file = $file;
        $this->path = public_path('assets/images/testimonials/uploads/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
//        $this->thumbnail($full_name);
//        $this->large($full_name);
        $this->thumbWidthKeepAspect($full_name);
        $this->largeWidthKeepAspect($full_name);
        $this->saveName = $full_name.'.'.$this->fileext;
        return $this->saveName;
    }

    public function corporateClientLogoSetup($file, $full_name)
    {
        // Thumb X - Y, Large X - Y
        $this->setSizes(30, 30, 200, 200);
        $this->file = $file;
        $this->path = public_path('assets/images/corporateClients/uploads/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
//        $this->thumbnail($full_name);
//        $this->large($full_name);
        $this->thumbHeightKeepAspect($full_name);
        $this->largeHeightKeepAspect($full_name);
        $this->saveName = $full_name.'.'.$this->fileext;
        return $this->saveName;
    }

    public function agentImageSetup($file, $full_name)
    {
        // Thumb X - Y, Large X - Y
        $this->setSizes(300, 300, 600, 600);
        $this->file = $file;
        $this->path = public_path('assets/images/logos/uploads/');
        $this->filename = $this->filename();
        $this->fileext = $this->fileType();
//        $this->thumbnail($full_name);
//        $this->large($full_name);
        $this->thumbHeightKeepAspect($full_name);
        $this->largeHeightKeepAspect($full_name);
        $this->saveName = $full_name.'.'.$this->fileext;
        return $this->saveName;
    }
//    public function categorySetup($file)
//    {
//         Thumb X - Y, Large X - Y
//        $this->setSizes(200, 200, 600, 600);
//        $this->file = $file;
//        $this->path = public_path('img/categories/');
//        $this->filename = $this->filename();
//        $this->thumbnail();
//        $this->large();
//        return $this->filename;
//    }
//
//    public function productSetup($file, $foldername)
//    {
//        $this->setSizes(200, 200, 600, 600);
//        $this->file = $file;
//        $this->path = public_path('img/products/'.$foldername.'/MAIN/');
//        $this->filename = $this->filename();
//        $this->fileext = $this->fileType();
//        $this->thumbnail();
//        $this->large();
//        return $this->filename;
//    }
//
//
//    public function variantSetup($file, $foldername)
//    {
//        list($width, $height) = getimagesize($file);
//        $this->setImageSizes($width,$height);
//        $this->setSizes(200, 200, $width, $height);
//        $this->file = $file;
//        $this->path = public_path('img/variants/'.$foldername.'/');
//        $this->filename = $this->filename();
//        $this->fileext = $this->fileType();
//        $this->thumbnail();
//        $this->large();
//        return $this->filename;
//    }
//
//    public function variantSetup2($file, $foldername)
//    {
//        $this->getImageSizes();
//        $this->setSizes(200, 200, 600, 600);
//        $this->file = $file;
//        $this->path = public_path('img/variants/'.$foldername.'/');
//        $this->filename = $this->filename();
//        $this->fileext = $this->fileType();
//        $this->thumbnail();
//        $this->large();
//        return $this->filename;
//    }
//
//    public function eCatelogueSetup($file, $filename)
//    {
//        $this->file = $file;
//        $this->path = public_path('img/ecatelogues/');
//        $this->filename = $this->filename();
//        $this->fileext = $this->fileType();
//        $this->asIs($filename);
//        return $this->fileType();
//    }
//
//    public function clientLogoSetup($file, $company, $client, $filename)
//    {
//        $this->setSizes(200, 200, 600, 600);
//        $this->file = $file;
//        $this->path = public_path('img/company_images/'.$company.'/clients/'.$client.'/logo/');
//        $this->filename = $this->filename();
//        $this->fileext = $this->fileType();
//        $this->asIs($filename);
//        $this->thumbnail();
//        $this->large();
//        return $this->filename;
//    }


//    public function clientFlyerSetup($file, $company, $client, $foldername)
//    {
//        list($width, $height) = getimagesize($file);
//        $this->setImageSizes($width,$height);
//        $this->setSizes(200, 200, $width, $height);
//        $this->file = $file;
//        $this->path = public_path('img/company_images/'.$company.'/clients/'.$client.'/flyer/'.$foldername.'/');
//        $this->filename = $this->filename();
//        $this->fileext = $this->fileType();
//        $this->thumbnail();
//        $this->large();
//        return $this->filename;
//    }
//
//    public function flyerCaptionSetup($file)
//    {
//        $this->file = $file;
//        $this->path = public_path('img/flyers/');
//        $this->filename = $this->uniqueFilename();
//        $this->asIs();
//        return $this->filename;
//    }
//
//    public function flyerMainSetup($file)
//    {
//        $this->file = $file;
//        $this->path = public_path('img/flyers/');
//        $this->filename = $this->uniqueFilename();
//        $this->fileext = $this->fileType();
//        $this->asIs();
//        return $this->filename;
//    }
//
//    public function promotionCaptionSetup($file)
//    {
//        $this->file = $file;
//        $this->path = public_path('img/promotions/');
//        $this->filename = $this->uniqueFilename();
//        $this->fileext = $this->fileType();
//        $this->asIs($this->filename);
//        return $this->filename.'.'.$this->fileext;
//    }
//
//    public function promotionMainSetup($file)
//    {
//        $this->file = $file;
//        $this->path = public_path('img/promotions/');
//        $this->filename = $this->uniqueFilename();
//        $this->fileext = $this->fileType();
//        $this->asIs($this->filename);
//        return $this->filename.'.'.$this->fileext;
//    }
//
//    public function subdomainLogoSetup($file, $foldername, $filename)
//    {
//        $this->setSizes(200, 200, 600, 600);
//        $this->file = $file;
//        $this->path = public_path('img/company_logos/'.$foldername.'/logo/');
//        $this->filename = $this->filename();
//        $this->fileext = $this->fileType();
//        $this->asIs($filename);
//        $this->thumbnail();
//        $this->large();
//        return $this->filename;
//    }

    public function thumbHeightKeepAspect($name)
    {
        Image::make($this->file)->resize(null, $this->thumby, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($this->path .$name.'.'.$this->fileext);
    }
    public function largeHeightKeepAspect($name)
    {
        Image::make($this->file)->resize(null, $this->largey, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($this->path .'large-'.$name.'.'.$this->fileext);
    }
    public function thumbWidthKeepAspect($name)
    {
        Image::make($this->file)->resize($this->thumbx, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($this->path .$name.'.'.$this->fileext);
    }
    public function largeWidthKeepAspect($name)
    {
        Image::make($this->file)->resize($this->largex, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($this->path .'large-'.$name.'.'.$this->fileext);
    }
    public function thumbnail($name)
    {
        Image::make($this->file)->fit($this->thumbx, $this->thumby)->save($this->path .$name.'.'.$this->fileext);
    }

    public function asIs($filename)
    {
        Image::make($this->file)->save($this->path . $filename .'.'. $this->fileext);
    }

    public function large($name)
    {
        Image::make($this->file)->fit($this->largex, $this->largey)->save($this->path .'large-'.$name.'.'.$this->fileext);
    }

    public function rename($previousFile, $newFile)
    {
        return $this->previousPath->rename($previousFile, $newFile);
    }

    public function filename()
    {
        return $this->file->getClientOriginalName();
    }

    public function fileType()
    {
        return $this->file->getClientOriginalExtension();
    }

    public function uniqueFilename()
    {
        return uniqid() . $this->file->getClientOriginalName();
    }

    public function uploadPath()
    {
        return $this->file->getRealPath();
    }

    protected function setSizes($thumbx, $thumby, $largex, $largey)
    {
        $this->thumbx = $thumbx;
        $this->thumby = $thumby;
        $this->largex = $largex;
        $this->largey = $largey;
    }
    protected function setImageSizes($width, $height)
    {
        if($height == $width)
        {
            $setImageHeight = 600;
            $setImageWidth = 600;
        }
        if($width > $height)
        {
            $setImageWidth = 600;
            $calculating1 = $width;
            $calculating2 = $height;
            $calculating3 = $setImageWidth;
            $setImageHeight = $calculating2*(100+((($calculating3-$calculating1)/$calculating1)*100))/100;
        }
        if($height > $width)
        {
            $setImageHeight = 600;
            $calculating1 = $height;
            $calculating2 = $width;
            $calculating3 = $setImageHeight;
            $setImageWidth = $calculating2*(100+((($calculating3-$calculating1)/$calculating1)*100))/100;
        }
        $this->thumbx = round($setImageWidth/3, 0);
        $this->thumby = round($setImageHeight/3, 0);
        $this->largex = round($setImageWidth, 0);
        $this->largey = round($setImageHeight, 0);
    }


}