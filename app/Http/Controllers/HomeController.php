<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    

use App\name;
use App\User;
use App\team;
use App\Teacher;
use App\news;
use App\Message;
use App\info;
use App\about;
use App\subscribe;
use App\social;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Mime\Email;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function index()
    {
        $name = name::paginate(1);
        $nameCount = name::count();
        $message = Message::paginate(3);
        $messageCount = Message::count();
        $sub = subscribe::all();
        $subCount = subscribe::count();
        $about = about::all();
        $userCount = User::count();
        $teamCount = team::count();
        $teacherCount = Teacher::count();
        $newsCount = news::count();
        $social = social::all();

        return view('home', [
            'name' => $name,
            'nameCount' => $nameCount,
            'about' => $about,
            'messageCount' => $messageCount,
            'sub' => $sub,
            'subCount' => $subCount,
            'userCount' => $userCount,
            'teamCount' => $teamCount,
            'teacherCount' => $teacherCount,
            'newsCount' => $newsCount,
            'message' => $message,
            'social' => $social
        ]);
    }


    //  show functions
    public function users(){
        $message = Message::paginate(3);
        $messageCount = Message::count();
        $user = User::all();
        return view('Users',[
            'user' => $user,
            'messageCount' => $messageCount,
            'message' => $message
        ]);
    }
    public function team(){
        $message = Message::paginate(3);
        $messageCount = Message::count();
        $team = team::all();
        return view('team',[
            'team' => $team,
            'messageCount' => $messageCount,
            'message' => $message
        ]);
    }
    public function teacher(){
        $message = Message::paginate(3);
        $messageCount = Message::count();
        $teacher = teacher::all();
        return view('teacher',[
            'teacher' => $teacher,
            'messageCount' => $messageCount,
            'message' => $message
        ]);
    }
    public function news(){
        $message = Message::paginate(3);
        $messageCount = Message::count();
        $news = news::all();
        return view('news',[
            'news' => $news,
            'messageCount' => $messageCount,
            'message' => $message
        ]);
    }
    public function message(){
        $message = Message::all();
        $messageCount = Message::count();
        return view('message',[
            'message' => $message,
            'messageCount' => $messageCount

        ]);
    }
    public function info(){
        $info = info::paginate(1);
        $message = Message::paginate(3);
        $messageCount = Message::count();
        return view('info',[
            'info' => $info,
            'messageCount' => $messageCount,

            'message' => $message
        ]);
    }
    public function about(){
        $about = about::paginate(3);
        $messageCount = Message::count();
        return view('about',[
            'messageCount' => $messageCount,
            
            'about' => $about
        ]);
    }

    public function changer(){
        $new = new name;
        $new->name = $_POST['name'];
        $new->type = '1';
        $new->save();
        return back();
    }

    // add Functions
    public function addUser(Request $request){
        $new = new User();
        $new->name = $_POST['name'];
        $new->email = $_POST['email'];
        $new->password = $_POST['password'];
        $img = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('user'), $img);
        $new->img = $img;
        $new-> save();
        return back();
    }

    public function addTeam(Request $request){
        $new = new team();
        $new->name = $_POST['name'];
        $img = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('team'), $img);
        $new->img = $img;
        $new->job = $_POST['job'];
        $new-> save();
        return back();
    }
    public function addTeacher(Request $request){
        $new = new Teacher();
        $new->name = $_POST['name'];
        $img = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('teachers'), $img);
        $new->img = $img;
        $new->job = $_POST['job'];
        $new->message = $_POST['message'];
        $new-> save();
        return back();
    }
    public function addNews(){
        $new = new news();
        $new->name = $_POST['name'];
        $new->about = $_POST['about'];
        $new-> save();
        return back();
    }
    public function addInfo(){
        $new = new info();
        $new->location = $_POST['location'];
        $new->email = $_POST['email'];
        $new->number = $_POST['number'];
        $new-> save();
        return back();
    }
    public function addAbout(){
        $new = new about();
        $new->icon = $_POST['icon'];
        $new->name = $_POST['name'];
        $new->about = $_POST['about'];
        $new-> save();
        return back();
    }
    public function addSocial(){
        $new = new social();
        $new->name = $_POST['name'];
        $new->link = $_POST['link'];
        $new-> save();
        return back();
    }
    

    // edit Functions

    public function editUser(Request $request , $id){
        $img = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('user'), $img);
        User::where('id',$id)->update([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>Hash::make('$request->password'),
            'img'=>$img
        ]);
        return back();
    }
    public function editTeam(Request $request , $id){
        $img = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('team'), $img);
        team::where('id',$id)->update([
            'name' => $request->name,
            'img'=>$img,
            'job'=>$request->job
        ]);
        return back();
    }
    public function editTeacher(Request $request , $id){
        $img = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('teachers'), $img);
        Teacher::where('id',$id)->update([
            'name' => $request->name,
            'img'=>$img,
            'job'=>$request->job,
            'message'=>$request->message
        ]);
        return back();
    }
    public function editNews(Request $request , $id){
        news::where('id',$id)->update([
            'name' => $request->name,
            'about'=>$request->about,
        ]);
        return back();
    }
    public function editInfo(Request $request , $id){
        info::where('id',$id)->update([
            'location' => $request->location,
            'email'=>$request->email,
            'number'=>$request->number,
        ]);
        return back();
    }
    public function editAbout(Request $request , $id){
        about::where('id',$id)->update([
            'icon' => $request->icon,
            'name'=>$request->name,
            'about'=>$request->about,
        ]);
        return back();
    }
    public function editSocial(Request $request , $id){
        social::where('id',$id)->update([
            'name'=>$request->name,
            'link'=>$request->link,
        ]);
        return back();
    }
    public function editSiteName(Request $request , $id){
        name::where('id',$id)->update([
            'name'=>$request->name
        ]);
        return back();
    }
    // delete Functions
    public function deleteUser($id){
        User::where('id', $id)->delete();
        return back();
    }
    public function deleteTeam($id){
        team::where('id', $id)->delete();
        return back();
    }
    public function deleteTeacher($id){
        Teacher::where('id', $id)->delete();
        return back();
    }
    public function deleteNews($id){
        news::where('id', $id)->delete();
        return back();
    }
    public function deleteMessage($id){
        Message::where('id', $id)->delete();
        return back();
    }
    public function deleteSubscriber($id){
        subscribe::where('id', $id)->delete();
        return back();
    }
    public function deleteSocial($id){
        social::where('id', $id)->delete();
        return back();
    }



    public function checked($id){
        Message::where('id',$id)->update([
            'type'=> 1
        ]);
        return back();
    }
    public function checkUser1($id){
        User::where('id',$id)->update([
            'admin'=> 1
        ]);
        return back();
    }
    public function checkUser2($id){
        User::where('id',$id)->update([
            'admin'=> 2
        ]);
        return back();
    }
    public function profile(){
        $message = Message::paginate(3);
        return view('profile',[
            'message' => $message
        ]);
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
