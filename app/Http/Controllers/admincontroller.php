<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\businesstable;
use  App\aboutcompany;
use  App\jobtable;
use  App\teammembertable;
use  App\sliderimagetable;
use  App\blogtable;
use  App\whatwedotable;
use  App\eventtable;
use  App\whereweworktable;
use  App\researchtable;
use  App\casestudytable;
use  App\ourservicetable;
use  App\newstable;
use  App\callpartnertable;
use  App\ourstorytable;
use  App\missionandvaluetable;
use  App\videotable;
use  App\booktable;
use  App\User;
use Hash;
use Validator;
use DB;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;

class admincontroller extends Controller
{
    //
    public function __construct(){
    	 $this->middleware('auth');
    }
    public function getAdminindex(){
    	return view('admin.index');
    }
    //to add business 
    public function getAddbusiness(){
    	return view('admin.addbusiness');
    }
 
    public function postAddbusiness(Request $request){  //add a website link
        $obj= new businesstable;
        $validation= Validator::make($request->all(),[
            'title'=>'required',
            'slogan'=>'required',
            'website'=>'required',
            'description'=>'required',
            'front_image'=>'dimensions:width=1200,height=703',
            'single_image'=>'dimensions:width=808,height=400'
            
        ],['front_image.dimensions'=>'Please upload image of sixe 1200*703',
        'single_image.dimensions'=>'Please upload image of size 808*400',
        'required'=>'Please fill out all fields'
        ]);

        if($validation->fails()){
            // echo "hey";
            return response()->json(['error'=>$validation->errors()->all()]);
        }
        $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->title)), '-');
        $obj->title= $request->get('title');
        $obj->slogan=$request->get('slogan');
        $obj->business_website=$request->get('website');
        $obj->business_intro= $request->get('description');
        
        $file= $request->file('front_image');
        $filename= md5(time()).".".$file->getClientOriginalName();
        $location="public/businessimage/";
        $file->move($location,$filename);
        $image=$location.$filename;
        $obj->front_image= $image;

        $titleimage= $request->file('title_image');
        $filen= md5(time()).".".$titleimage->getClientOriginalName();
        $location="public/businessimage/";
        $titleimage->move($location,$filen);
        $image=$location.$filen;
        $obj->title_image= $image;


        $single= $request->file('single_image');
        $filenames= md5(time()).".".$single->getClientOriginalName();
        $locations="public/businessimage/";
        $single->move($locations,$filenames);
        $images=$locations.$filenames;
        $obj->single_page_image= $images;


        $result= $obj->save();
        if($result){
            //dd($result);
            return response()->json(['message'=>'Succesfully Added']);
        }
        else{
            return response()->json(['error'=>'Sorry could not be added at the moment']);
        }


    }

    public function getSeebusiness(){
        $obj=businesstable::all();
        return view('admin.viewbusiness',array('result'=>$obj));
    }
    public function getEditbusiness($id){
        $obj= businesstable::find($id);
        return view('admin.editbusiness',array('result'=>$obj));

    }

    public function postEditbusiness($id, Request $request){
        $obj= businesstable::find($id);
        $validation= Validator::make($request->all(),[
            'title'=>'required',
            'front_image'=>'dimensions:width=1200,height=703',
            'single_image'=>'dimensions:width=808,height=400',
            'slogan'=>'required',
            'website'=>'required',
            'description'=>'required'

            
            
            
            
        ],['front_image.dimensions'=>'Please upload front image of sixe 1200*703',
        'single_image.dimensions'=>'Please upload single page image of size 808*400',
        'required'=>'Please fill out all fields'
        ]);

        if($validation->fails()){
            // echo "hey";
            return response()->json(['error'=>$validation->errors()->all()]);
        }
        $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->title)), '-');
        $obj->title=Input::get('title');
        $obj->slogan=Input::get('slogan');
        $obj->business_website=Input::get('website');
        $obj->business_intro=Input::get('edit_desc');
        
        $file= Input::file('front_image');
        if(!empty($file)){
            $filename= md5(time()).".".$file->getClientOriginalName();
            $location="public/businessimage/";
            $file->move($location,$filename);
            $image=$location.$filename;
            $obj->image= $image;
        }

         $titleimage=Input::file('title_image');
         if(!empty($file)){
        $filen= md5(time()).".".$titleimage->getClientOriginalName();
        $location="public/businessimage/";
        $titleimage->move($location,$filen);
        $image=$location.$filen;
        $obj->title_image= $image;}

        $single=Input::file('single_image');
        if(!empty($single)){
            $filenames= md5(time()).".".$single->getClientOriginalName();
            $locations="public/businessimage/";
            $single->move($locations,$filenames);
            $images=$locations.$filenames;
            $obj->single_page_image= $images;

        }

        $result= $obj->save();
        if($result){
            return response()->json(['message'=>'Succesfully edited']);
        }
        else{
            return response()->json(['error'=>'Could not be edited']);
        }

    }
     public function getDeletebusiness($id){
        $obj=businesstable::find($id);
        $obj->delete();
        
        return response()->json($obj);

    }
    //endof business

    //start of about us
    public function getAddourcompany(){
        return view('admin.addourcompany');
    }

    public function postAddourcompany(Request $request){
        $obj= new aboutcompany;
        $validation=Validator::make($request->all(),[
        'intro'=>'required',
        
        'image'=>'required|dimensions:width=1800,height=572'
        ],['required'=>'Please fill out all fields',
            'dimensions'=>'Please upload image of dimensions 1800*572'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
        }

        $obj->company_introduction= $request->get('intro');
        
        $file= $request->file('image');
        $filename= md5(time()).".".$file->getClientOriginalName();
        $location="public/aboutusimages/";
        $file->move($location,$filename);
        $image=$location.$filename;
        $obj->image= $image;
        $result=$obj->save();
        if($result){
            return response()->json(['message'=>'Succesfully Added']);
        }
        else{
            return response()->json(['error'=>'Sorry could not be added at the moment. Please try again later']);
        }


    }

    public function getSeeaboutcompanycontent(){
        $obj=aboutcompany::all();
        return view('admin.viewaboutcompany',array('result'=>$obj));
    }

    public function getDeleteaboutcompanycontent($id){
        $obj=aboutcompany::find($id);
        $obj->delete();
        return response()->json($obj);

    }

    public function getEditaboutcompanycontent($id){
        $obj= aboutcompany::find($id);
        return view('admin.editaboutcompany',array('result'=>$obj));
    }

    public function postEditaboutcompanycontent($id, Request $request){
        $obj= aboutcompany::find($id);
        $validation=Validator::make($request->all(),[
        'intro'=>'required',
        'image'=>'required|dimensions:width=1800,height=572'
       
        
        ],['required'=>'Please fill out all fields',
            'dimensions'=>'Please upload image of dimensions 1800*572'
        ]);
        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
        }
        $obj->company_introduction=Input::get('intro');
       
        $file=Input::file('image');
        if(!empty($file)){
            $filename= md5(time()).".".$file->getClientOriginalName();
            $location="public/aboutusimages/";
            $file->move($location,$filename);
            $image=$location.$filename;
            $obj->image= $image;
        }
        $result= $obj->save();
        if($result){
            return response()->json(['message'=>'Content succesfully edited']);
        }
        else{
            return response()->json(['error'=>'Content could not be edited at the moment']);
        }
    }


    //end

    //teammember
    public function getAddteammember(){
        return view('admin.addteammember');
        
    }

    public function postAddteammember(Request $request){
        $obj= new teammembertable;
        $validation= Validator::make($request->all(),[
            'fullname'=>'required',
            'position'=>'required',
            'desription'=>'required',
            'image'=>'required|dimensions:width=232,height=265'
           
        ],['image.dimensions'=>'Please upload image of dimension 232*265',
        'required'=>'please fill out all fields'
    ]);
        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
        }
        $obj->member_name= $request->get('fullname');
        $obj->postion= $request->get('position');
        $obj->description_of_team_member= $request->get('desription');
        $file= $request->file('image');
        $filename=md5(time()).".".$file->getClientOriginalName();
        $location="public/aboutusimages/";
        $file->move($location,$filename);
        $image=$location.$filename;
        $obj->image= $image;
        $result= $obj->save();
        if($result){
            return response()->json(['message'=>'Team Member Succesfully Added']);
        }
        else{
            return response()->json(['error'=>'Sorry Team member could not be added. Please Try Again later']);
        }

    }

    public function getSeeallteammember(){
        $obj= teammembertable::all();
        return view('admin.viewallteammember',array('result'=>$obj));
    }

    public function getDeleteteammember($id){
        // return $id;
        $obj=teammembertable::find($id);
        $obj->delete();
        
        return response()->json($obj);

    }

    public function getEditteammember($id){
        $obj= teammembertable::find($id);
        return view('admin.editteammember',array('result'=>$obj));
    }

    public function postEditteammember($id, Request $request){
        $obj= teammembertable::find($id);
        $validation= Validator::make($request->all(),[
            'fullname'=>'required',
            'position'=>'required',
            'desription'=>'required',
            'image'=>'required|dimensions:width=232,height=265'
            
           
        ],['required'=>'Please fill out all the fields',
        'image.dimensions'=>'Please select image of dimension 232*265'
        ]);
        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
        }
        $obj->member_name=Input::get('fullname');
        $obj->postion=Input::get('position');
        $obj->description_of_team_member=Input::get('desription');
        $file=Input::file('image');
        if(!empty($file)){
            $filename= md5(time()).".".$file->getClientOriginalName();
            $location="public/aboutusimages/";
            $file->move($location,$filename);
            $image=$location.$filename;
            $obj->image= $image;
        }
        $result= $obj->save();
        if($result){
            return response()->json(['message'=>'Team member succesfully edited']);
        }
        else{
            return response()->json(['error'=>'Could not be edited']);
        }

    }


    //end

//start of adding job
public function getAddjob(){
    return view('admin.addanewjob');
}

public function postAddjob(Request $request){
    $obj= new jobtable;
    $validation=Validator::make($request->all(),[
        'job_title'=>'required',
        'job_position'=>'required',
        'job_description'=>'required',
        'job_location'=>'required',
        'job_department'=>'required',
        'expiry_date'=>'required',
        'job_type'=>'required',
        'job_salary'=>'required'

    ],['required'=>'Please fill out all the fields']
);
    if($validation->fails()){
        return response()->json(['error'=>$validation->errors()->all()]);
    }  

    $obj->job_title=$request->get('job_title');
    $obj->job_position=$request->get('job_position');
    $obj->job_description=$request->get('job_description');
    $obj->job_location=$request->get('job_location');
    $obj->job_department=$request->get('job_department');
    $obj->expiry_date=$request->get('expiry_date');
    $obj->job_type=$request->get('job_type');
    $obj->job_salary=$request->get('job_salary');
    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'New Job Added']);
    }
    else{
        return response()->json(['error'=>'Sorry could not be added at the monemt']);
    }


}

public function getSeealljobs(){
    $obj= jobtable::all();
    return view('admin.viewalljobs',array('result'=>$obj));
}

public function getDeletejob($id){
    $obj= jobtable::find($id);
    $obj->delete();
    return response()->json($obj);

}

public function getEditjob($id){
    $obj=jobtable::find($id);
    return view('admin.editjob',array('result'=>$obj));
}

public function postEditjob($id, Request $request){
    $obj= jobtable::find($id);
    $validation=Validator::make($request->all(),[
        'job_title'=>'required',
        'job_position'=>'required',
        'edit_desc'=>'required',
        'job_location'=>'required',
        'job_department'=>'required',
        'expiry_date'=>'required',
        'job_type'=>'required',
        'job_salary'=>'required'

    ],['required'=>'please fill out all fields']
);
    if($validation->fails()){
        return response()->json(['error'=>$validation->errors()->all()]);
    }  

    $obj->job_title=Input::get('job_title');
    $obj->job_position=Input::get('job_position');
    $obj->job_description=Input::get('edit_desc');
    $obj->job_location=Input::get('job_location');
    $obj->job_department=Input::get('job_department');
    $obj->expiry_date=Input::get('expiry_date');
    $obj->job_type=Input::get('job_type');
    $obj->job_salary=Input::get('job_salary');
    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'Succesfully Edited']);
    }
    else{
        return response()->json(['error'=>'Could not be edited at the moment']);
    }

}

//end

//start of adding blogs
public function getAddnewblog(){
    return view('admin.addnewblog');
}

public function postAddnewblog(Request $request){
    $obj= new blogtable;
    $validation=Validator::make($request->all(),[
        'blog_title'=>'required',
        'blog_description'=>'required',
        'blog_image'=>'dimensions:width=330,height=198',
        'blog_single_image'=>'dimensions:width=860,height=358'
                                
    ],['blog_image.dimensions'=>'Please upload thumbnail image of dimension 330*198 ',
    'blog_single_image.dimensions'=>'Please upload single image of dimensions 860*358',
    'required'=>'Please fill out all fields'
    ]);
    if($validation->fails()){
        return response()->json(['error'=>$validation->errors()->all()]);

    }
    $obj->blog_title=$request->get('blog_title');
    $obj->blog_description= $request->get('blog_description');
    $file=$request->file('blog_image');
    $filename=md5(time()).".".$file->getClientOriginalName();
    $location="public/blogimages/";
    $file->move($location,$filename);
    $image=$location.$filename;
    $obj->blog_image= $image;

    $single=$request->file('blog_single_image');
     $filenames= md5(time()).".".$single->getClientOriginalName();
    $locations="public/blogimages/";
    $single->move($locations,$filenames);
    $images=$locations.$filenames;
    $obj->blog_single_image= $images;

    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'New Blog succesfully added']);
    }
    else{
        return response()->json(['error'=>'Sorry blog could not be added at the moment']);
    }


}

public function getSeeallblogs(){
    $obj= DB::table('blogtables')->orderBy('created_at','desc')->get();
    return view('admin.viewallblog',array('result'=>$obj));

}

public function getDeleteablog($id){
    $obj=blogtable::find($id);
    //return $obj;
    $obj->delete();
    return response()->json($obj);
}

public function getEditblog($id){
    $obj= blogtable::find($id);
    return view('admin.editblog',array('result'=>$obj));
}

public function postEditblog($id,Request $request){
    $obj= blogtable::find($id);
    $validation=Validator::make($request->all(),[
        'blog_title'=>'required',
       'blog_image'=>'dimensions:width=330,height=198',
        'blog_single_image'=>'dimensions:width=860,height=358'
                                
    ],['blog_image.dimensions'=>'Please upload thumbnail image of dimension 330*198 ',
    'blog_single_image.dimensions'=>'Please upload single image of dimensions 860*358',
    'required'=>'Please fill out all fields'
    ]);
    if($validation->fails()){
        return response()->json(['error'=>$validation->errors()->all()]);

    }
    $obj->blog_title=Input::get('blog_title');
    $obj->blog_description=Input::get('edit_desc');
    $file=Input::file('blog_image');
    if(!empty($file)){
    $filename=md5(time()).".".$file->getClientOriginalName();
    $location="public/blogimages/";
    $file->move($location,$filename);
    $image=$location.$filename;
    $obj->blog_image= $image;
    }

    $single=Input::file('blog_single_image');
    if(!empty($single)){
     $filenames= md5(time()).".".$single->getClientOriginalName();
    
    $locations="public/blogimages/";
    $single->move($locations,$filenames);
    $images=$locations.$filenames;
    $obj->blog_single_image= $images;
}
    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'New Blog succesfully added']);
    }
    else{
        return response()->json(['error'=>'Sorry blog could not be added at the moment']);
    }

}

//end

//slider image
public function getAddsliderimage(){
    return view('admin.addsliderimage');
}

public function postAddsliderimage(Request $request){
    $obj=new sliderimagetable;
    $validation=Validator::make($request->all(),[
        'slider_short_description'=>'required',
        'slider_title'=>'required',
        'slider_image'=>'required'
                                
    ],['required'=>'Please out all fields']);
    if($validation->fails()){
        return response()->json(['error'=>$validation->errors()->all()]);

    }
    $obj->slider_short_info=$request->get('slider_short_description');
    $obj->slider_title=$request->get('slider_title');
    $obj->slider_image_status=$request->get('slider_status');
    $file= $request->file('slider_image');
    $filename= md5(time()).".".$file->getClientOriginalName();
    $location="public/sliderimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->slider_image= $image;
    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'New slider image succesfully added']);
    }
    else{
        return response()->json(['error'=>'Slider image could not be added at the moment']);
    }
}

public function getSeeallsliderimage(){
    $obj= DB::table('sliderimagetables')->orderBy('created_at','desc')->get();
    return view('admin.viewallsliderimage',array('result'=>$obj));
}

public function getDeletesliderimage($id){
    $obj= sliderimagetable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function getEditsliderimage($id){
    $obj= sliderimagetable::find($id);
    return view('admin.editasliderimage',array('result'=>$obj));
}

public function postEditsliderimage($id,Request $request){
    $obj= sliderimagetable::find($id);
    $validation=Validator::make($request->all(),[
        'edit_desc'=>'required',
        'slider_title'=>'required',
        
                                
    ],['required'=>'Please fill out all fields']);
    if($validation->fails()){
        return response()->json(['error'=>$validation->errors()->all()]);

    }
    $obj->slider_short_info=Input::get('edit_desc');
    $obj->slider_title=Input::get('slider_title');
    
    $file= Input::get('slider_image');
    if(!empty($file)){
    $filename= md5(time()).".".$file->getClientOriginalName();
    $location="public/sliderimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->slider_image= $image;
    }
    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'New slider image succesfully added']);
    }
    else{
        return response()->json(['error'=>'Slider image could not be added at the moment']);
    }
}


//end

//what we do add
public function getAddwhatwedo(){
    return view('admin.addwhatwedo');
}

public function postAddwhatwedo(Request $request){
    $obj= new whatwedotable;
    $validation=Validator::make($request->all(),[
        'title'=>'required',
        
        //'image'=>'dimensions:width=808,height=400'
        ],[//'image.dimensions'=>'please upload image of dimension 808*400',
        'required'=>'Please fill out all fields'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->title)), '-');
    $obj->title=$request->get('title');
    $obj->introduction=$request->get('intro');
   
    $file=$request->file('image');
    $filename= md5(time()).".".$file->getClientOriginalName();
   
    $location="public/businessimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->image= $image;
     

    $points = $request->all('point')['point'];
    $total = count($points);
    
    $image_arrays = [];
    $point_descriptions= [];

    for($i=0;$i<$total;$i++){
            $file = $points[$i]['point_image'];
            $filename= md5(time()).".".$file->getClientOriginalName();
            $location="public/businessimage/";
            $file->move($location,$filename);
            $image = $location.$filename;
            $image_arrays[$i] = $image;

            $point_descriptions[$i] = $points[$i]['textarea'];
    }
    $obj->point_image = json_encode($image_arrays);
    $obj->point_description = json_encode($point_descriptions);


    // $images=$request->file('point_image');
    // foreach ($images as  $files) {
    //     $filenames = md5(time()).".".$files->getClientOriginalName();
    //     $locations = "public/businessimage/";
    //     $files->move($locations,$filenames);
    //     $images = $locations.$filenames;
    //     $image_arrays[] = $images;
    // }
    // $obj->point_image = json_encode($image_arrays);

    // $point_description=$request->get('textarea');
    // foreach ($point_description as  $fileeeee) {
        
    //     $point_descriptions[] = $fileeeee;
    // }
    // $obj->point_description = json_encode($point_descriptions);



    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully added']);
    }
    else{
        return respose()->json(['error'=>'Content could not be added at the moment']);
    }

}

public function getSeeallwhatwedo(){
    $obj= DB::table('whatwedotables')->orderBy('created_at','desc')->get();
    return view('admin.viewwhatwedo',array('result'=>$obj));
    //return view('')
}

public function getDeletewhatwedo($id){
    $obj= whatwedotable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function getEditwhatwedo($id){
    $obj= whatwedotable::find($id);
    return view('admin.editwhatwedo',array('result'=>$obj));

}

public function postEditwhatwedo($id,Request $request){
    $obj= whatwedotable::find($id);
    
    $validation=Validator::make($request->all(),[
        'title'=>'required',
        //'image'=>'dimensions:width=808,height=400'
        
        
        ],[//'image.dimensions'=>'please upload image of dimension 808*400',
        'required'=>'Please fill out all fields'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->title)), '-');
    $obj->title=Input::get('title');
    $obj->introduction=Input::get('edit_desc');
    
    $file=Input::file('image');
    if(!empty($file)){
        $filename= md5(time()).".".$file->getClientOriginalName();
        $location="public/businessimage/";
        $file->move($location,$filename);
        $image= $location.$filename;
        $obj->image= $image;
    }
   
    $existing_images = json_decode($obj->point_image);
    $existing_textarea = json_decode($obj->point_description);

    $points = Input::all('point')['point'];
    $total = count($points);

    for($i=0;$i<$total;$i++){
        if (isset($points[$i]['point_image'])){
            $file = $points[$i]['point_image'];
            $filename= md5(time()).".".$file->getClientOriginalName();
            $location="public/businessimage/";
            $file->move($location,$filename);
            $image = $location.$filename;
            $existing_images[$i] = $image;
        }

        if (isset($points[$i]['textarea'])){
            $existing_textarea[$i] = $points[$i]['textarea'];
        }
    }
    $obj->point_image = json_encode(array_slice($existing_images,0,$total));
    $obj->point_description = json_encode(array_slice($existing_textarea,0,$total));


    // if(!empty($images)){
    
    //     foreach ($images as  $files) {
    //         $filenames = md5(time()).".".$files->getClientOriginalName();
    //         $locations = "public/businessimage/";
    //         $files->move($locations,$filenames);
    //         $images = $locations.$filenames;
    //         $image_arrays[] = $images;
    //     }
    //     $obj->point_image = json_encode($image_arrays);
    // }


    // $point_description=Input::get('textarea');
    // $point_descriptions= [];
    // foreach ($point_description as  $fileeeee) {
    //     $point_descriptions[] = $fileeeee;
    // }
    // $obj->point_description = json_encode($point_descriptions);
        
   




    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully edited']);
    }
    else{
        return response()->json(['error'=>'Content could not edited at the moment']);
    }

}


//end

//add event
public function getAddevent(){
    return view('admin.addevent');

}

public function postAddevent(Request $request){  
    $obj= new eventtable;
    $validation=Validator::make($request->all(),[
        'event_title'=>'required',
        'event_description'=>'required',
        'event_address'=>'required',
        'event_venue'=>'required',
        'event_from'=>'required',
        'event_image'=>'dimensions:width=230,height=270',
        'event_single_image'=>'dimensions:width=860,height=358'
        

    ],['event_image.dimensions'=>'please upload preview image of dimensions 230*270',
    'event_single_image.dimensions'=>'please upload single page image of dimensions 860*358',
    'required'=>'Please fill out all fields'
]
);
    if($validation->fails()){
        return response()->json(['error'=>$validation->errors()->all()]);
    } 
    $obj->event_title=$request->get('event_title');
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->event_title)), '-');
    $obj->event_description=$request->get('event_description');
    $obj->event_address=$request->get('event_address');
    $obj->event_venue=$request->get('event_venue');
    $obj->event_date_from=$request->get('event_from');
    $obj->event_date_to=$request->get('event_to');
    $file= $request->file('event_image');
    $filename= md5(time()).".".$file->getClientOriginalName();
    $location="public/blogimages/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->event_image= $image;

    $files= $request->file('event_single_image');
    $filenames=md5(time()).".".$files->getClientOriginalName();
    $locations="public/blogimages/";
    $files->move($locations,$filenames);
    $images= $locations.$filenames;
    $obj->event_single_image= $images;
    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'Event succesfully Added']);
    }
    else{
        return response()->json(['error'=>'Event could not be added']);
    }

}

public function getSeeallevent(){
    $obj= eventtable::all();
    return view('admin.viewallevent',array('result'=>$obj));
}

public function getDeleteevent($id){
    $obj= eventtable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function getEditevent($id){
    $obj= eventtable::find($id);
    return view('admin.editevent',array('result'=>$obj));
}

public function postEditevent($id,Request $request){
    $obj= eventtable::find($id);
    $validation=Validator::make($request->all(),[
        'event_title'=>'required',
        'edit_desc'=>'required',
        'event_address'=>'required',
        'event_venue'=>'required',
        'event_from'=>'required',
         'event_image'=>'dimensions:width=230,height=270',
        'event_single_image'=>'dimensions:width=860,height=358'
        
        

    ],['event_image.dimensions'=>'please upload preview image of dimensions 230*270',
    'event_single_image.dimensions'=>'please upload single page image of dimensions 860*358',
    'required'=>'Please out all fields'
]
);
    if($validation->fails()){
        return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->event_title)), '-'); 
    $obj->event_title=Input::get('event_title');
    $obj->event_description=Input::get('edit_desc');
    $obj->event_address=Input::get('event_address');
    $obj->event_venue=Input::get('event_venue');
    $obj->event_date_from=Input::get('event_from');
    $obj->event_date_to=Input::get('event_to');
    $file= Input::file('event_image');
    if(!empty($file)){
    $filename= md5(time()).".".$file->getClientOriginalName();
    $location="public/blogimages/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->event_image= $image;
    }

     $files=Input::file('event_single_image');
     if(!empty($file)){
    $filenames=md5(time()).".".$files->getClientOriginalName();
    $locations="public/blogimages/";
    $files->move($locations,$filenames);
    $images= $locations.$filenames;
    $obj->event_single_image= $images;
}

    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'Event succesfully edited']);
    }
    else{
        return response()->json(['error'=>'Event could not be edited']);
    }

}
//end

//where we work 
public function getAddwherewework(){
    return view('admin.addwherewework');
}

public function postAddwherewework(Request $request){
    $obj= new whereweworktable;
    $validation= Validator::make($request->all(),[
            'title'=>'required',
            'intro'=>'required',
            
            'image'=>'dimensions:width=808,height=400'
        ],['image.dimensions'=>'Please upload image of dimesnion 808*400',
        'required'=>'Please out all fields'
        ]);

        if($validation->fails()){
           
            return response()->json(['error'=>$validation->errors()->all()]);
        }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->title)), '-');
    $obj->title=$request->get('title');
    $obj->whatwedo_intro=$request->get('intro');
    
    $file=$request->file('image');
    $filename= md5(time()).".".$file->getClientOriginalName();
    $location="public/whereweworkimages/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->image= $image;
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully added']);
    }

    else{
        return response()->json(['error'=>'Content could not be added']);
    }
}

public function getSeeallwherewework(){
    $obj=DB::table('whereweworktables')->orderBy('created_at','desc')->get();
    return view('admin.viewwherewework',array('result'=>$obj));
}

public function getDeletewherewework($id){
    $obj= whereweworktable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function getEditwherewework($id){
    $obj=whereweworktable::find($id);
    return view('admin.editwherewework',array('result'=>$obj));
}

public function postEditwherewework($id, Request $request){
    $obj=whereweworktable::find($id);
    $validation= Validator::make($request->all(),[
            'title'=>'required',
            'edit_desc'=>'required',
            'image'=>'dimensions:width=808,height=400'
            
        ],['image.dimensions'=>'Please upload image of dimesnion 808*400',
        'required'=>'Please out all fields'
        ]);

        if($validation->fails()){
           
            return response()->json(['error'=>$validation->errors()->all()]);
        }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->title)), '-');
    $obj->title=Input::get('title');
    $obj->whatwedo_intro=Input::get('edit_desc');
    
    $file=Input::file('image');
    if(!empty($file)){
    $filename= md5(time()).".".$file->getClientOriginalName();
    $location="public/whereweworkimages/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->image= $image;
    }
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully added']);
    }

    else{
        return response()->json(['error'=>'Content could not be added']);
    }
}
//end

//research add 
public function getAddresearch(){
    return view('admin.addnewresearch');
}

public function postAddnewresearch(Request $request){
    $obj=new researchtable;
    $validation=Validator::make($request->all(),[
        'research_title'=>'required',
        'research_description'=>'required',
        'research_image'=>'dimensions:width=330,height=150',
        
        ],['research_image.dimensions'=>'please upload image of sixe 300*150',
        'required'=>'Please fill out all fields'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->research_title)), '-');
    $obj->research_title= $request->get('research_title');
    $obj->research_description=$request->get('research_description');
    $file=$request->file('research_image');
    $filename= md5(time()).".".$file->getClientOriginalExtension();
    $location="public/researchimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->research_image= $image;
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Content Succesfullu Added']);
    }
    else{
        return response()->json(['error'=>'Content could not be added']);
    }

}

public function getSeeallresearch(){
    $obj=DB::table('researchtables')->orderBy('created_at','desc')->get();
    return view('admin.viewresearch',array('result'=>$obj));
}

public function getDeleteresearch($id){
    $obj=researchtable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function getEditresearch($id){
    $obj=researchtable::find($id);
    return view('admin.editresearch',array('result'=>$obj));
}

public function postEditresearch($id,Request $request){
    $obj=researchtable::find($id);
    $validation=Validator::make($request->all(),[
        'research_title'=>'required',
        'edit_desc'=>'required',
        'research_image'=>'dimensions:width=330,height=150',
        
        
        ],['research_image.dimensions'=>'please upload image of sixe 300*150',
        'required'=>'Please fill out all fields'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->research_title)), '-');
    $obj->research_title= $request->get('research_title');
    $obj->research_description=$request->get('edit_desc');
    $file=$request->file('research_image');
    if(!empty($file)){
    $filename= md5(time()).".".$file->getClientOriginalExtension();
    $location="public/researchimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->research_image= $image;
    }
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Content Succesfully Edited']);
    }
    else{
        return response()->json(['error'=>'Content could not be edited']);
    }
}
//end

//add case study
public function getAddcasestudy(){
    return view('admin.addcasestudy');
}
public function postAddcasestudy(Request $request){
    $obj= new casestudytable;
    $validation=Validator::make($request->all(),[
        'case_title'=>'required',
        'case_description'=>'required',
        // 'case_image'=>'dimensions:width=535,height=374',
        
        ],['required'=>'Please fill out all fields']
        // ,['case_image.dimensions'=>'Please upload image of dimensions 535*374']
    );

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->case_title)), '-');
    $obj->case_title=$request->get('case_title');
    $obj->case_description=$request->get('case_description');
    $files=$request->file('case_image');
    $image_array = [];
    foreach ($files as  $file) {
        $filename = md5(time()).".".$file->getClientOriginalName();
        $location = "public/casestudyimage/";
        $file->move($location,$filename);
        $image = $location.$filename;
        $image_array[] = $image;
    }
    $obj->case_images = json_encode($image_array);
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'content succesfully added']);
    }
    else{
        return response()->json(['error'=>'Content could not be added']);
    }

}

public function getSeeallcasestudy(){
    $obj=DB::table('casestudytables')->orderBy('created_at','desc')->get();
    return view('admin.viewallcasestudy',array('result'=>$obj));
}

public function getDeletecasestudy($id){
    $obj= casestudytable::find($id);
    $obj->delete();
    return response()->json($obj);
}

// public function getEditcasestudy($id){
//     $obj= casestudytable::find($id);
//     return view('admin.editcasestudy',array('result'=>$obj));
// }

public function postEditcasestudy($id,Request $request){
    $obj= casestudytable::find($id);
    $validation=Validator::make($request->all(),[
        'case_title'=>'required',
        'edit_description'=>'required',
        
        // 'case_image'=>'dimensions:width=535,height=374',
        
        ],['required'=>'Please fill out all fields']
        // ,['case_image.dimensions'=>'Please upload image of dimensions 535*374']
    );

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->case_title)), '-');
    $obj->case_title=Input::get('case_title');
    $obj->case_description=Input::get('edit_description');

    $files=Input::file('case_image');
     

    $image_array = [];
    if(!empty($files)){

    foreach ($files as  $file) {
        $filename = md5(time()).".".$file->getClientOriginalName();
        $location = "public/casestudyimage/";
        $file->move($location,$filename);
        $image = $location.$filename;
        $image_array[] = $image;
    }
    $obj->case_images = json_encode($image_array);
}
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'content succesfully added']);
    }
    else{
        return response()->json(['error'=>'Content could not be added']);
    }

}
//end
 

// our services
public function getSeeallservices(){
    $obj=DB::table('ourservicetables')->get();
    return view('admin.viewourservice',array('result'=>$obj));
}

public function postService(Request $request){
    $obj=new ourservicetable;
    $validation=Validator::make($request->all(),[
        'service_title'=>'required',
        'description'=>'required',
        'service_image'=>'dimensions:width=1800,height=572',
        
        ],['service_image.dimensions'=>'Please upload image of dimension 1800*572',
        'required'=>'Please fill out all fields'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->service_title)), '-');
    $obj->service_title=$request->get('service_title');
   $obj->service_description=$request->get('description');
    $file=$request->file('service_image');
    $filename= md5(time()).".".$file->getClientOriginalExtension();
    $location="public/serviceimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->service_image= $image;
    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully added']);
    }
    else{
        return response()->json(['error'=>'Content could not be added']);
    }
}

public function getDeleteservice($id){
    $obj=ourservicetable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function postEditservice($id,Request $request){
    $obj= ourservicetable::find($id);
    $validation=Validator::make($request->all(),[
        'service_title'=>'required',
        'edit_desc'=>'required',
        'service_image'=>'dimensions:width=1800,height=572',
        
        
        ],['service_image.dimensions'=>'Please upload image of dimension 1800*572',
        'required'=>'Please fill out all fields'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->service_title)), '-');
    $obj->service_title=Input::get('service_title');
   $obj->service_description=Input::get('edit_desc');
    $file=Input::file('service_image');
    if(!empty($file)){
    $filename= md5(time()).".".$file->getClientOriginalExtension();
    $location="public/serviceimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->service_image= $image;
    }
    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully added']);
    }
    else{
        return response()->json(['error'=>'Content could not be added']);
    }

}
//end

//news
public function getSeeallnews(){
    $obj= newstable::all();
    return view('admin.viewallnews',array('result'=>$obj));
}

public function postAddnews(Request $request){
    $obj=new newstable;
    $validation=Validator::make($request->all(),[
        'news_title'=>'required',
        'news_description'=>'required',
        'news_source'=>'required',
        'news_image'=>'dimensions:width=508,height=339',
        'news_single_image'=>'dimensions:width=860,height=358'

        
        
        ],['news_image.dimensions'=>'Please select image of dimension 508*339',
        'news_single_image.dimensions'=>'Please select image of dimension 860*358',
        'required'=>'Please fill out all fields'
    ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->news_title)), '-');
    $obj->title=$request->get('news_title');
    $obj->fullnews=$request->get('news_description');
    $obj->news_source=$request->get('news_source');
    $file=$request->file('news_image');
    $filename= md5(time()).".".$file->getClientOriginalExtension();
    $location="public/newsimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->image= $image;

    $single=$request->file('news_single_image');
     $filenames= md5(time()).".".$single->getClientOriginalName();
    $locations="public/newsimage/";
    $single->move($locations,$filenames);
    $images=$locations.$filenames;
    $obj->single_page_image= $images;



    $result= $obj->save();
    if($result){
        return response()->json(['message'=>'News succesfully added']);
    }
    else{
        return response()->json(['error'=>'News could not be added']);
    }
}

public function getDeletenews($id){
    $obj= newstable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function postEditnews($id, Request $request){
    $obj=newstable::find($id);
    $validation=Validator::make($request->all(),[
        'news_title'=>'required',
        'edit_desc'=>'required',
        'news_source'=>'required',
        
'news_image'=>'dimensions:width=508,height=339',
        'news_single_image'=>'dimensions:width=860,height=358'

        
        
        ],['news_image.dimensions'=>'Please select image of dimension 508*339',
        'news_single_image.dimensions'=>'Please select image of dimension 860*358',
        'required'=>'please fill out all fields']);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }

    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->news_title)), '-');
    $obj->title=$request->get('news_title');
    $obj->fullnews=$request->get('edit_desc');
    $obj->news_source=$request->get('news_source');
    $file=$request->file('news_image');
    if(!empty($file)){
        $filename= md5(time()).".".$file->getClientOriginalExtension();
        $location="public/newsimage/";
        $file->move($location,$filename);
        $image= $location.$filename;
        $obj->image= $image;
    }

    $single=Input::file('news_single_image');
    if(!empty($single)){
     $filenames= md5(time()).".".$single->getClientOriginalName();
    
    $locations="public/newsimage/";
    $single->move($locations,$filenames);
    $images=$locations.$filenames;
    $obj->single_page_image= $images; 
    $result=$obj->save(); }

    if($result){
        return response()->json(['message'=>'News succesfully edited']);
    }
    else{
        return response()->json(['error'=>'NEws could not be edited']);
    }
}

public function getSeepartner(){
    $obj=callpartnertable::orderBy('created_at','desc')->with('OrmBusinesspartner')->get();;
    $business=DB::table('businesstables')->get();

    return view('admin.viewpartner',array('result'=>$obj,'busy'=>$business));
}

public function getCallpartner(){
    $business=DB::table('businesstables')->get();
    return view('admin.callforpartner',array('result'=>$business));
}

public function postCallpartner(Request $request){
    $obj=new callpartnertable;
    
    $obj->business_name=$request->get('business');
    $obj->partner_type=$request->get('partner');
    $obj->short_description=$request->get('short_description');
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Succesfully Added']);
    }
    else{
        return response()->json(['error'=>'Could not be added']);
    }



}

public function getDeletepartner($id){
    $obj=callpartnertable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function getEditpartner($id){
    $obj=callpartnertable::find($id);

    $business=businesstable::all();
    return view('admin.editpartner',array('result'=>$obj,'busy'=>$business));
}

public function postEditPartner($id){
    $obj=callpartnertable::find($id);
    $obj->business_name=Input::get('business');
    $obj->partner_type=Input::get('partner');
    $obj->short_description=Input::get('short_description');
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Succesfully  Edited']);
    }
    else{
        return response()->json(['error'=>'Could not be edited']);
    }

}

public function getSeeourstory(){
    $obj=ourstorytable::all();
    return view('admin.viewourstory',array('result'=>$obj));

}

public function postAddourstory(Request $request){

    $obj=new ourstorytable;
    $validation=Validator::make($request->all(),[
        
        
        'image'=>'required|dimensions:width=808,height=800'
        ],['required'=>'Please fill out all fields',
            'dimensions'=>'Please upload image of dimensions 808*800'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
        }

    $obj->title=$request->get('title');
    $obj->description=$request->get('intro');
    $file=$request->file('image');
    $filename= md5(time()).".".$file->getClientOriginalExtension();
    $location="public/storyimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->image= $image;
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully added']);
    }
    else{
        return response()->json(['error'=>'Cpntent could not be added']);
    }

}

public function postEditourstory($id){
    $obj=ourstorytable::find($id);
     $validation=Validator::make($request->all(),[
        
        
        'image'=>'required|dimensions:width=808,height=800'
        ],['required'=>'Please fill out all fields',
            'dimensions'=>'Please upload image of dimensions 808*800'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
        }
    $obj->title=Input::get('title');
    $obj->description=Input::get('edit_desc');
    $file=Input::file('image');
     if(!empty($file)){
        $filename= md5(time()).".".$file->getClientOriginalExtension();
    $location="public/storyimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->image= $image;
    }
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully edited']);
    }
    else{
        return response()->json(['error'=>'Cpntent could not be edited']);
    }


}

public function getSeemissionandvalue(){
    $obj=missionandvaluetable::all();
    return view('admin.viewmissionandvalue',array('result'=>$obj));
}

public function postAddmission(Request $request){
    $obj=new missionandvaluetable;
    $validation=Validator::make($request->all(),[
        
        'image'=>'required|dimensions:width=808,height=800'
       
        
        ],['required'=>'Please fill out all fields',
            'dimensions'=>'Please upload image of dimensions 808*800'
        ]);
        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
        }


    $obj->title=$request->get('title');
    $obj->description=$request->get('intro');
    $file=$request->file('image');
    $filename= md5(time()).".".$file->getClientOriginalExtension();
    $location="public/storyimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->image= $image;
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully edited']);
    }
    else{
        return response()->json(['error'=>'Cpntent could not be edited']);
    }


}

public function postEditmission($id,Request $request){
    $obj=missionandvaluetable::find($id);
    $validation=Validator::make($request->all(),[
        
        'image'=>'required|dimensions:width=808,height=800'
       
        
        ],['required'=>'Please fill out all fields',
            'dimensions'=>'Please upload image of dimensions 808*800'
        ]);
        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
        }
    $obj->title=Input::get('title');
    $obj->description=Input::get('edit_desc');
    $file=Input::file('image');
     if(!empty($file)){
        $filename= md5(time()).".".$file->getClientOriginalExtension();
    $location="public/storyimage/";
    $file->move($location,$filename);
    $image= $location.$filename;
    $obj->image= $image;
    }
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Content succesfully edited']);
    }
    else{
        return response()->json(['error'=>'Cpntent could not be edited']);
    }

}

public function getSeealladmin(){
    $power=Auth::user()->power;
    if($power==1){
        $obj=DB::table('users')->get();
        return view('admin.viewalladmin',array('result'=>$obj));
    }
    else{
        return redirect()->back();
    }

}

public function postAddadmin(Request $request){
    $obj= new user;
    $validation=Validator::make($request->all(),[
        'password'=>'Same:confirmpassword',
        'confirmpassword'=>'Same:password'
        

        
        
        ],['password.same'=>'Password and confirm password donot match',
        'confirmpassword.same'=>'Password and confirm password donot match'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->name=$request->get('name');
    $obj->email=$request->get('email');
    $obj->password=Hash::make($request->get('confirmpassword'));
    $obj->power=$request->get('power');
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'New Admin succesfully added']);
    }
    else{
        return response()->json(['error'=>'New admin could not be added']);
    }
}

public function getDeleteadmin($id){
    $power=Auth::user()->power;
    if($power==1){
    $obj=user::find($id);
    $obj->delete();
    return response()->json($obj);
}
else{
    return redirect()->back();
}
}

public function getUpgradetosuper($id){
    $power=Auth::user()->power;
    if($power==1){
        $obj=user::find($id);
        $obj->power=1;
        $obj->save();
        return response()->json($obj);
    }
    else{
        return redirect()->back();
    }
}

public function getDegradetoadmin($id){
    $power=Auth::user()->power;
    if($power==1){
        $obj=user::find($id);
        $obj->power=0;
        $obj->save();
        return response()->json($obj);
    }
    else{
        return redirect()->back();
    }

}

public function getSeevideo(){
    $obj=DB::table('videotables')->orderBy('created_at','desc')->get();
    return view('admin.viewvideo',array('result'=>$obj));

}

public function postVideo(Request $request){
    $obj=new videotable;
    $validation=Validator::make($request->all(),[
        'description'=>'required',
        'video_image'=>'dimensions:width=330,height=186'
        

        
        
        ],['required'=>'please fill  out all fields',
        'dimensions'=>'Please upload image of width 330 and height 186'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->video_title)), '-');
    $obj->video_title=$request->get('video_title');
    $obj->video_link=$request->get('video_link');
    $obj->video_description=$request->get('description');
    $obj->video_runtime=$request->get('video_runtime');
    $file= $request->file('video_image');
        $filename=md5(time()).".".$file->getClientOriginalName();
        $location="public/aboutusimages/";
        $file->move($location,$filename);
        $image=$location.$filename;
        $obj->video_image= $image;
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'video succesfully posted']);
    }
    else{
        return response()->json(['error'=>'Video could not be added']);
    }
}

public function getDeletevideo($id){
    $obj=videotable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function postEditvideo($id,Request $request){
    $obj=videotable::find($id);
    $validation=Validator::make($request->all(),[
        'edit_desc'=>'required',
        'video_image'=>'dimensions:width=330,height=186'
        

        
        
        ],['required'=>'please fill  out all fields',
        'dimensions'=>'Please upload image of width 330 and height 186'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->video_title)), '-');
    $obj->video_title=Input::get('video_title');
    $obj->video_link=Input::get('video_link');
    $obj->video_description=Input::get('edit_desc');
    $obj->video_runtime=Input::get('video_runtime');
    $file= Input::file('video_image');
    if(!empty($file)){
        $filename=md5(time()).".".$file->getClientOriginalName();
        $location="public/aboutusimages/";
        $file->move($location,$filename);
        $image=$location.$filename;
        $obj->video_image= $image;
    }
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Succesfully edited']);
    }
    else{
        return response()->json(['error'=>'Could not be edited']);
    }

}

public function getSeebook(){
    $obj=booktable::all();
    return view('admin.viewbook',array('result'=>$obj));
}

public function postBook(Request $request){
    $obj=new booktable;
    $validation=Validator::make($request->all(),[
        'book_description'=>'required',
        'book_image'=>'dimensions:width=329,height=290'
        

        
        
        ],['required'=>'please fill  out all fields',
        'dimensions'=>'Please upload image of width 329 and height 290'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->book_title)), '-');
    $obj->book_title=$request->get('book_title');
    $obj->book_price=$request->get('book_price');
    $obj->book_description=$request->get('book_description');
    $file= $request->file('book_image');
        $filename=md5(time()).".".$file->getClientOriginalName();
        $location="public/aboutusimages/";
        $file->move($location,$filename);
        $image=$location.$filename;
        $obj->book_image= $image;
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'New book succesfully added']);
    }
    else{
        return response()->json(['error'=>'Book could not be added']);
    }
    

}

public function getDeletebook($id){
    $obj=booktable::find($id);
    $obj->delete();
    return response()->json($obj);
}

public function postEditbook($id,Request $request){
    $obj=booktable::find($id);
    $validation=Validator::make($request->all(),[
        'edit_desc'=>'required',
        'book_image'=>'dimensions:width=329,height=290'
        

        
        
        ],['required'=>'please fill  out all fields',
        'dimensions'=>'Please upload image of width 329 and height 290'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()->all()]);
    }
    $obj->slug=trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($request->book_title)), '-');
    $obj->book_title=Input::get('book_title');
    $obj->book_price=Input::get('book_price');
    $obj->book_description=Input::get('edit_desc');
    $file= Input::file('book_image');
    if(!empty($file)){
        $filename=md5(time()).".".$file->getClientOriginalName();
        $location="public/aboutusimages/";
        $file->move($location,$filename);
        $image=$location.$filename;
        $obj->book_image= $image;
    }
    $result=$obj->save();
    if($result){
        return response()->json(['message'=>'Succesfully edited']);
    }
    else{
        return response()->json(['error'=>'Could not be edited']);
    }

}

}
