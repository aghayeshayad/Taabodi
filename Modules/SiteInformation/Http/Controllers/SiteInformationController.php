<?php

namespace Modules\SiteInformation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Modules\SiteInformation\Entities\SiteInformation;
use Modules\SiteInformation\Entities\Socials;
use Modules\SiteInformation\Http\Requests\SiteInformationStoreRequest;

class SiteInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $aboutUS = SiteInformation::where('type', SiteInformation::TYPES['about_us'])->first();
        $contactUs = SiteInformation::where('type', SiteInformation::TYPES['contact_us'])->first();
        $socials = SiteInformation::where('type', SiteInformation::TYPES['socials'])->first();
        $fast_links = SiteInformation::where('type', SiteInformation::TYPES['fast_links'])->first();
        return view('siteinformation::index', compact('aboutUS', 'contactUs', 'socials', 'fast_links'));
    }

    public function store(Request $request, SiteInformation $setting)
    {
        $data = $request->all();

        if ($request->has('aboutUs')) {
            if (array_key_exists('image', $data['aboutUs'])) {
                $ext = $data['aboutUs']['image']->getClientOriginalExtension();
                $name = time() . '.' . $ext;
                $path = public_path('/uploads/settings/aboutus');
                $data['aboutUs']['image']->move($path, $name);
                $data['aboutUs']['image'] = $name;
            } else {
                $aboutUS = SiteInformation::where('type', SiteInformation::TYPES['about_us'])->first();
                $data['aboutUs']['image'] = $aboutUS->data['image'];
            }

            $this->fillRequest($data['aboutUs'], SiteInformation::TYPES['about_us'], $setting);
        }

        if ($request->has('contactUs')) {
            $this->fillRequest($data['contactUs'], SiteInformation::TYPES['contact_us'], $setting);
        }

        if ($request->has('socials')) {
            $this->fillRequest($data['socials'], SiteInformation::TYPES['socials'], $setting);
        }

        if ($request->has('fast_links')) {
            $this->fillRequest($data['fast_links'], SiteInformation::TYPES['fast_links'], $setting);
        }

        return redirect()->to(route('admin.siteinformation.index'))
            ->with('success', _('SIteInformation created successfully!'));
    }
    public function fillRequest($data, $type, $model)
    {
        $data = ['data' => $data];
        /**
         * @var SiteInformation $model
         */
        $model->updateOrCreate(
            ['type' => $type],
            ['type' => $type, 'data' => $data]
        );
    }
}
