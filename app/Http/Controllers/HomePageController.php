<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\HeadService;
use App\ContentService;
use App\HeadWsaAbCon;
use App\ContWsaAbCon;
use App\PriPartTar;
use App\Gallery;
use App\WsaGlobal;
use App\MediaProduct;
use App\Training;
use App\Preference;
use App\News;
use App\Partner;
use App\PartnerLorem;
use App\Directory;
use App\DirectoryLorem;
use App\Structure;
use App\StructureLorem;
use App\EasySponsor;
use App\CommonInfo;
use App\CommonLorem;
use App\HomeSlider;
use View;

class HomePageController extends Controller
{
    protected $getUrl;
    protected $find;

    public function __construct(Request $request) {

        $getUrl = $request->path();
        $find = $request->segment(1). '/';

        View::share ( 'getUrl', $getUrl );
        View::share ( 'find', $find );
    }  

    public function index()
    {
        $homesliders = HomeSlider::orderBy('place', 'ASC')->get();
    	return view('frontend.index', compact('homesliders'));
    }

    public function wsaPrice(){
    	$priparttars = PriPartTar::whereName('price')->get();
    	return view('frontend.wsa_content', compact('priparttars'));
    }

    public function wsaPartner(){
        $priparttars = PriPartTar::whereName('partner')->get();
        return view('frontend.wsa_content', compact('priparttars'));
    }

    public function ourPartner(){
        return view('frontend.ourpartner');
    }

    public function wsaTarget(){
        $priparttars = PriPartTar::whereName('target')->get();
        return view('frontend.wsa_content', compact('priparttars'));
    }

    public function wsaAbout(){
    	$headwsaabconts = HeadWsaAbCon::whereName('about')->get();
    	$contentwsaabconts = ContWsaAbCon::whereName('about')->get();
    	return view('frontend.wsa_about', compact('headwsaabconts', 'contentwsaabconts'));
    }

    public function wsaContext(){
        $headwsaabconts = HeadWsaAbCon::whereName('context')->get();
        $contentwsaabconts = ContWsaAbCon::whereName('context')->get();
        return view('frontend.wsa_about', compact('headwsaabconts', 'contentwsaabconts'));
    }

    public function wsagallery(){
    	$galleries = Gallery::orderBy('id', 'DESC')->paginate(9);
    	return view('frontend.wsa_gallery', compact('galleries'));
    }

    public function wsarules(){
    	$rules = PriPartTar::whereName('rule')->get();
    	return view('frontend.wsa_rules', compact('rules'));
    }

    public function wsaglobal(){
    	$headglobals = PriPartTar::whereName('global')->get();
    	$contentglobals = WsaGlobal::orderBy('id', 'DESC')->get();
    	return view('frontend.wsa_corporate', compact('headglobals', 'contentglobals'));
    }

    public function communal(){
    	$headcommunal = HeadService::whereName('asan')->first();
        $easysponsors = EasySponsor::orderBy('id', 'DESC')->get();
    	return view('frontend.asan_communal', compact('headcommunal', 'easysponsors'));
    }

    public function training(){
    	$headservices = HeadService::whereName('telim')->get();
    	$contentservices = ContentService::whereName('telim')->get();
    	return view('frontend.services', compact('headservices', 'contentservices'));
    }

    public function seyyar(){
    	$headservices = HeadService::whereName('seyyar')->get();
    	$contentservices = ContentService::whereName('seyyar')->get();
    	return view('frontend.services', compact('headservices', 'contentservices'));
    }

    public function it(){
    	$headservices = HeadService::whereName('it')->get();
    	$contentservices = ContentService::whereName('it')->get();
    	return view('frontend.services', compact('headservices', 'contentservices'));
    }

    public function pay(){
    	$products = MediaProduct::where('name', 'pay')->orderBy('id', 'DESC')->get();
        $trainings = Training::where('name', 'pay')->orderBy('id', 'DESC')->get();
        $preferences = Preference::where('name', 'pay')->orderBy('id', 'DESC')->get();
    	return view('frontend.products', compact('products', 'trainings', 'preferences'));
    }

    public function radio(){
        $products = MediaProduct::where('name', 'radio')->orderBy('id', 'DESC')->get();
        $trainings = Training::where('name', 'radio')->orderBy('id', 'DESC')->get();
        $preferences = Preference::where('name', 'radio')->orderBy('id', 'DESC')->get();
        return view('frontend.products', compact('products', 'trainings', 'preferences'));
    }

    public function visa(){
        $products = MediaProduct::where('name', 'visa')->orderBy('id', 'DESC')->get();
        $trainings = Training::where('name', 'visa')->orderBy('id', 'DESC')->get();
        $preferences = Preference::where('name', 'visa')->orderBy('id', 'DESC')->get();
        return view('frontend.products', compact('products', 'trainings', 'preferences'));
    }

    public function electron(){
        $products = MediaProduct::where('name', 'electron')->orderBy('id', 'DESC')->get();
        $trainings = Training::where('name', 'electron')->orderBy('id', 'DESC')->get();
        $preferences = Preference::where('name', 'electron')->orderBy('id', 'DESC')->get();
        return view('frontend.products', compact('products', 'trainings', 'preferences'));
    }

    public function news(){
        $news = News::orderBy('id', 'DESC')->skip(0)->take(9)->get();
        return view('frontend.news', compact('news', 'last'));
    }

    public function ajaxnews(){
        $ids = [];
        $images = [];
        $days = [];
        $months = [];
        $years = [];
        $titles = [];
        $contents = [];
        $all = [];
        $count = 0;
        $news = News::orderBy('id', 'DESC')->skip(Input::get('count')*Input::get('i'))->take(9)->get();
        foreach ($news as $new) {
            $ids['id'] = $new->id;
            $images['image'] = $new->images->first()->image;
            $days['day'] = $new->created_at->day;
            $months['month'] = $new->created_at->format('F');
            $years['year'] = $new->created_at->format('Y');
            $titles['title'] = $new->translate(config('app.locale'))->title;
            $contents['content'] = str_limit(strip_tags($new->translate(config('app.locale'))->content));
            $all[$count] = $ids + $images + $days + $months + $years + $titles + $contents;
            $count++;
        }
        return $all;
    }

    public function news_single($id){
        $news = News::findOrFail($id);
        $lastnews = News::where('id', '!=', $id)->orderBy('id', 'DESC')->take(3)->get();
        return view('frontend.news_single', compact('news', 'lastnews'));
    }

    public function partners(){
        $partners = Partner::all();
        $partnerlorems = PartnerLorem::all();
        return view('frontend.partners', compact('partners', 'partnerlorems'));
    }

    public function staffs(){
        $staffs = Directory::get();
        $loremfirst = DirectoryLorem::first();
        $loremlast = DirectoryLorem::all()->last();
        return view('frontend.staff', compact('staffs', 'loremfirst', 'loremlast'));
    }

    public function staff_single($id){
        $staff = Directory::findOrFail($id);
        $loremfirst = DirectoryLorem::first();
        return view('frontend.staff_single', compact('staff', 'loremfirst'));
    }

    public function structure(){
        $structures = Structure::get();
        $structurelorems = StructureLorem::all();
        return view('frontend.structure', compact('structures', 'structurelorems'));
    }

    public function about(){
        $infofirst = CommonInfo::first();
        $infolast = CommonInfo::all()->last();
        $commoninfolorems = CommonLorem::orderBy('id', 'DESC')->get();
        return view('frontend.about', compact('infofirst', 'infolast', 'commoninfolorems'));
    }

    public function contact(){
        return view('frontend.contact');
    }
}
