<?php


namespace App\Http\View\Composers;

use Illuminate\View\View;
use Modules\Categories\Entities\Category;
use Modules\SiteInformation\Entities\SiteInformation;


/**
 *
 */
class FooterComposer
{
    public function compose(View $view)
    {
        $categories = Category::whereNull('parent_id')->get();
        $subcats = Category::with(['Children' => function ($query) {
            $query->with('subcategory');
        }]);

        $aboutUs = SiteInformation::where('type', SiteInformation::TYPES['about_us'])->first();

        $contactUs = SiteInformation::where('type', SiteInformation::TYPES['contact_us'])->first();
        $fast_links = SiteInformation::where('type', SiteInformation::TYPES['fast_links'])->first();
        $socials = SiteInformation::where('type', SiteInformation::TYPES['socials'])->first();
//        dd($socials);

        $view->with(["socials" => $socials,
            "categories" => $categories, "subcats" => $subcats, "aboutUs" => $aboutUs,
            "fast_links" => $fast_links, "contactUs" => $contactUs
        ]);
    }
}
