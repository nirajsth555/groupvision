<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\businesstable;
use App\whatwedotable;
use App\whereweworktable;
use App\sliderimagetable;
use App\ourservicetable;
use App\aboutcompany;
use App\teammembertable;
use App\researchtable;
use App\blogtable;
use App\eventtable;
use App\newstable;
use App\casestudytable;
use App\jobtable;
use App\callpartnertable;
use App\missionandvaluetable;
use App\ourstorytable;
use App\videotable;
use App\booktable;
use DB;
use View;
use Mail;
use App\Mail\contact_us_mail;
use App\Mail\applyjobmail;
use App\Mail\become_a_partner_mail;
use App\Mail\comment_on_news;



class usercontroller extends Controller
{
    //
    public function __construct(){
    	$business= DB::table('businesstables')->orderBy('created_at','desc')->get();
    	$whatwedo= DB::table('whatwedotables')->orderBy('created_at','desc')->get();
    	$wherewework= DB::table('whereweworktables')->orderBy('created_at','desc')->get();
        $ourservices= DB::table('ourservicetables')->orderBy('created_at','desc')->get();
        $career=DB::table('jobtables')->orderBy('created_at','desc')->get();
    	$aboutus= DB::table('aboutcompanies')->get();
    	$team= DB::table('teammembertables')->get();
    	$research= DB::table('researchtables')->orderBy('created_at','desc')->get();
    	$blog=DB::table('blogtables')->orderBy('created_at','desc')->get();
    	$event=DB::table('eventtables')->orderBy('created_at','desc')->get();
    	$casestudy=DB::table('casestudytables')->orderBy('created_at','desc')->get();
        $data=array(
            'business'=>$business,
            'whawedo'=>$whatwedo,
            'wherewework'=>$wherewework,
            'services'=>$ourservices
        );
        View::share('d', $data);





    }
    public function getIndex(){
    	// $sliderimage= DB::table('sliderimagetables')->where('slider_image_status','1')->orderBy('created_at','desc')->get();
        $sliderimage= DB::table('sliderimagetables')->get();
        $news=DB::table('newstables')->orderBy('created_at','desc')->take(3)->get();
        $business=DB::table('businesstables')->get();

    	return view('user.index',array('slider'=>$sliderimage,'n'=>$news,'best'=>$business));
    }
     public function getCasestudies(Request $request){
        $obj= DB::table('casestudytables')->orderBy('created_at','desc')->paginate(2);
       
        $business=DB::table('businesstables')->get();
        
        if($request->ajax()){
            
            return Response::json(view('user.casestudyitem',compact('obj'))->render());
        }
        return view('user.case-studies',compact('obj','business'));
    }

    public function getSinglebusines($id){
        $business=DB::table('businesstables')->orderBy('created_at','desc')->get();
        $obj= businesstable::find($id);
        return view('user.business',array('result'=>$obj,'busines'=>$business));
    }

    public function getSinglewhatwedo($id){
        $whatwedo=DB::table('whatwedotables')->orderBy('created_at','desc')->get();
        $obj=whatwedotable::find($id); 

        return view('user.whatwedo',array('result'=>$obj,'busines'=>$whatwedo));
    }

    public function getSinglewherewework($id){
        $wherewework= DB::table('whereweworktables')->orderBy('created_at','desc')->get();
        $obj=whereweworktable::find($id);
        return view('user.wherewework',array('result'=>$obj,'busines'=>$wherewework));
    }

    public function getSingleourservices($id){
        $ourservices=DB::table('ourservicetables')->orderBy('created_at','desc')->get();
        $obj=ourservicetable::find($id);
        return view('user.ourservices',array('result'=>$obj,'busines'=>$ourservices));
    }

    public function getSingleourcompany(){
        $obj= aboutcompany::all();
        return view('user.whoarewe',array('result'=>$obj));
    }

    public function getOurteam(){
        $obj= teammembertable::all();
        return view('user.olt',array('result'=>$obj));
    }

    public function getOurmissionandvalue(){
        $obj=missionandvaluetable::all();
        return view('user.ourmissionandvalue',array('result'=>$obj));
    }

    public function getOurstory(){
        $obj= ourstorytable::all();
        return view('user.our-story',array('result'=>$obj));
    }

    public function getCarrer(Request $request){
        $obj= DB::table('jobtables')->orderBy('created_at','desc')->paginate('5');
        if($request->ajax()){
            return Response::json(view('user.carreritem',compact('obj'))->render());
        }
        return view('user.career',compact('obj'));
    }

    public function getSinglejob($id){
        $obj=jobtable::find($id);
        return view('user.apply',array('result'=>$obj));
    }

    public function postResume(Request $request){
        $file= $request->file('applicant_resume');
        $filename= $file->getClientOriginalName();
        $location="public/applicant_resume/";
        $file->move($location,$filename);

        $result=mail::to("imniraj555@gmail.com")->send(new applyjobmail($request));
        // $result=mail::to("swopnildangol@gmail.com")->send(new applyjobmail($request));
        return response()->json(['message'=>'Thank You for applying. We will get back to you soon']);

    }

   
    public function getResearch(){
        $obj=DB::table('researchtables')->orderBy('created_at','desc')->get();
        return view('user.research',array('result'=>$obj));
    }

    public function getSingleresearch($id){
        $obj=researchtable::find($id);

        return view('user.research-inner',array('result'=>$obj));
    }

    public function getBlog(Request $request){

        $obj=DB::table('blogtables')->orderBy('created_at','desc')->paginate('3');
        if($request->ajax()){
            return Response::json(view('user.blogitem',compact('obj'))->render());
        }
        return view('user.blog',compact('obj'));

    }

    public function getSingleblog($id){
        $obj= blogtable::find($id);
        $next=DB::table('blogtables')->where('id','>',$id)->first();
        $previous=DB::table('blogtables')->where('id','<',$id)->first();
        //$next= blogtable::where('id','>', $obj->id)->take(1)->get();
        //dd($next);
        return view('user.blog-inner',array('result'=>$obj,'n'=>$next,'p'=>$previous));
    }

    public function getEvents(){
        $obj=DB::table('eventtables')->orderBy('created_at','desc')->get();
        return view('user.events',array('result'=>$obj));
    }

    public function getSingleevent($id){
        $obj=eventtable::find($id);
        //return $obj;
        return view('user.eventinner',array('result'=>$obj));
    }



    public function getNews(){
        $allnews=DB::table('newstables')->orderBy('created_at','desc')->take(3)->get();
        $visionnews=DB::table('newstables')->where('news_source','0')->take(3)->get();
        $pressnews=DB::table('newstables')->where('news_source','1')->take(3)->get();
        return view('user.news',array('result'=>$allnews,'vision'=>$visionnews,'press'=>$pressnews));
    }

    public function getAllvisionnews(Request $request){
        $obj=DB::table('newstables')->where('news_source','0')->orderBy('created_at','desc')->paginate('5');
        if($request->ajax()){
            return Response::json(view('user.newsitem',compact('obj'))->render());
        }
        return view('user.listnews',compact('obj'));

    }

     public function getVideos(Request $request){
        $obj=DB::table('videotables')->orderBy('created_at','desc')->paginate('3');
        if($request->ajax()){
            return Response::json(view('user.videoitem',compact('obj'))->render());
        }
        return view('user.videos',compact('obj'));
     }

     public function getSinglevideo($id){
        $obj=videotable::find($id);
        $query=DB::table('videotables')->where('id',$id)->increment('views');
        $next=DB::table('videotables')->where('id','!=',$id)->inRandomOrder()->take(3)->get();
        
        
        return view('user.video',array('result'=>$obj,'n'=>$next));
     }

     public function getBooks(Request $request){
        $obj=DB::table('booktables')->orderBy('created_at','desc')->paginate('6');
        if($request->ajax()){
            return Response::json(view('user.bookitem',compact('obj'))->render());
        }
        return view('user.bookshop',compact('obj'));
    }

    public function getSinglebook($id){
        $obj=booktable::find($id);
        return view('user.book',array('result'=>$obj));
    }

    public function getAllpressnews(Request $request){
        $obj=DB::table('newstables')->where('news_source','1')->orderBy('created_at','desc')->paginate('5');
        if($request->ajax()){
            return Response::json(view('user.newsitem',compact('obj'))->render());
        }
        return view('user.listnews',compact('obj'));
    }

    public function getSinglenews($id){
        $obj=newstable::find($id);
        $next=DB::table('newstables')->where('id','>',$id)->first();
        $previous=DB::table('newstables')->where('id','<',$id)->first();
       
        //dd($next);
        return view('user.newsinner',array('result'=>$obj,'n'=>$next,'p'=>$previous));
    }

    public function getContactus(){
        return view('user.contact');
    }

   public function postContactus(Request $request){
    // return $request;
        $result=mail::to("imniraj555@gmail.com")->send(new contact_us_mail($request));
        return response()->json(['message'=>'Thank You for your message. We will get back to you as soon as possible']);

    }

    public function getPartnerpage(){
        // $obj= DB::table('callpartnertables')->orderBy()->get();
        $obj=callpartnertable::orderBy('created_at','desc')->with('OrmBusinesspartner')->get();
    //return $obj;
        return view('user.our-partners',array('result'=>$obj));

    }

    public function postPartner(Request $request){
        $result=mail::to("imniraj555@gmail.com")->send(new become_a_partner_mail($request));
        return response()->json(['message'=>'Thank You for applying. We will get back to you as soon as possible']);
        

    }

    public function postNewscomment(Request $request){
         $result=mail::to("imniraj555@gmail.com")->send(new comment_on_news($request));
        return response()->json(['message'=>'Thank You for the comment.']);


    }

    public function getSearch(Request $request){
        if($request->ajax()){
            $news= DB::table('newstables')->select('title','id','slug')
                ->where('title','LIKE','%'.$request->search."%")
                ->orWhere('fullnews','LIKE','%'.$request->search."%")
                ->get()->map(function($item,$key){
                    $item->url = url("single-news/{$item->id}/{$item->slug}");
                    return $item;
                })->toArray();



            $research = DB::table('researchtables')->select('research_title AS title','id','slug')
                ->where('research_title','LIKE','%'.$request->search."%")
                ->orWhere('research_description','LIKE','%'.$request->search."%")
                ->get()->map(function($item,$key){
                    $item->url = url("single-research/{$item->id}/{$item->slug}");
                    return $item;
                })->toArray();

            $business = DB::table('businesstables')->select('title','id','slug')
                ->where('title','LIKE','%'.$request->search."%")
                ->orWhere('slogan','LIKE','%'.$request->search."%")
                ->orWhere('business_intro','LIKE','%'.$request->search."%")
                ->get()->map(function($item,$key){
                    $item->url = url("our-business/{$item->id}/{$item->slug}");
                    return $item;
                })->toArray();

            $case = DB::table('blogtables')->select('blog_title AS title','id','slug')
                ->where('blog_title','LIKE','%'.$request->search."%")
                ->orWhere('blog_description','LIKE','%'.$request->search."%")
                ->get()->map(function($item,$key){
                    $item->url = url("single-blog/{$item->id}");

                    return $item;
                })->toArray();

            $service = DB::table('ourservicetables')->select('service_title AS title','id','slug')
                ->where('service_title','LIKE','%'.$request->search."%")
                ->orWhere('service_description','LIKE','%'.$request->search."%")
                ->get()->map(function($item,$key){
                    $item->url = url("our-services/{$item->id}/{$item->slug}");
                    return $item;
                })->toArray();

            //sab lai euta array ma merge gardine jasma chai title ra link matra huncha
            $response = array_merge($news,$research,$business,$case,$service);

            return response()->json($response);
        }
    }



    
}
