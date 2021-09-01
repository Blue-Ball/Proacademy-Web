<?php

function plasma(){
    if(file_exists(resource_path().'/views/web/plasma/view/main.blade.php') && getTemplate() == 'web.plasma')
        return true;

    return false;
}
function plasmaCheckLocale(){
    if(\Illuminate\Support\Facades\Cookie::has('lng'))
        \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Cookie::get('lng'));
}
function plasmaShowTopMenu($order){
    if(get_option('plasma_header_menu_'.$order.'_title','') != ''){
        return '<li><a href="'.get_option('plasma_header_menu_'.$order.'_url').'">'.get_option('plasma_header_menu_'.$order.'_title','').'</a></li>';
    }
}
function plasmaCategories(){
    $categories = [];
    $list = \App\Models\ContentCategory::withCount('contents')->get();
    foreach ($list as $item){
        if($item->contents_count > 0)
            $categories[] = [
                'title'     => strlen($item->title)>12?mb_substr($item->title,0,12).'...':$item->title,
                'icon'      => $item->image,
                'courses'   => $item->contents_count,
                'link'      => '/category/'.$item->class
            ];
    }

    return $categories;
}
function plasmaUserAvatar($userID){
    $user = \App\Models\Usermeta::where('user_id',$userID)->where('option','avatar')->first();
    if($user)
        return $user->value;

    return '/assets/default/images/user.png';
}
function plasmaContentText($text){
    $text = strip_tags($text);
    return mb_substr($text,0,100).'...';
}
function plasmaContentStar($rate){
    $star = '';
    $rate = ceil($rate);
    for($i=1;$i<=$rate;$i++){
        $star.= '<i class="iconly-boldStar"></i>';
    }
    for ($j=1;$j<=5-$rate;$j++){
        $star.= '<i class="iconly-brokenStar"></i>';
    }

    return $star;
}
function plasmaUserCourseCount($user_id){
    $count = \App\Models\Content::where('user_id',$user_id)->where('mode','publish')->count();
    return $count;
}
function plasmaChannelContentCount($channel_id){
    $count = \App\Models\ChannelVideo::where('chanel_id',$channel_id)->count();
    return $count;
}
function plasmaChannelFollowerCount($channel_id){
    $count = \App\Models\Follower::where('follower',$channel_id)->where('type','channel')->count();
    return $count;
}
function plasmaInstructorCurses($user_id, $limit = 4){
    $data = [];
    $list = \App\Models\Content::with(['user','metas'])->where('user_id', $user_id)->where('mode','publish')->limit($limit)->get();
    foreach ($list as $item){
        $meta = arrayToList($item->metas,'option','value');
        $data[] = [
            'product'   => $item,
            'meta'      => $meta
        ];
    }

    return $data;
}
function plasmaActiveMenu($slug,$slug2 = null){
    if($slug2 == null) {
        if (\Illuminate\Support\Facades\Request::segment(2) == $slug)
            return 'active';
    }else{
        if($slug2 == 'blank'){
            if (\Illuminate\Support\Facades\Request::segment(2) == $slug && \Illuminate\Support\Facades\Request::segment(3) == '') {
                return 'active';
            }
        }else {
            if (\Illuminate\Support\Facades\Request::segment(2) == $slug && \Illuminate\Support\Facades\Request::segment(3) == $slug2) {
                return 'active';
            }
        }
    }
}
function plasmaExpandMenu($slug,$slug2 = null){
    if($slug2 == null) {
        if (\Illuminate\Support\Facades\Request::segment(2) == $slug)
            return 'style="display:block"';
    }else{
        if($slug2 == 'blank'){
            if (\Illuminate\Support\Facades\Request::segment(2) == $slug && \Illuminate\Support\Facades\Request::segment(3) == '') {
                return 'style="display:block"';
            }
        }else {
            if (\Illuminate\Support\Facades\Request::segment(2) == $slug && \Illuminate\Support\Facades\Request::segment(3) == $slug2) {
                return 'style="display:block"';
            }
        }
    }
}
function plasmaUserLiveClasses($userID){
    $count = \App\Models\Content::where('type','LIKE','%webinar%')->where('mode','publish')->count();
    return $count;
}
function plasmaInstructorStudents($userID){
    $count = 0;
    $userContents = \App\Models\Content::where('user_id',$userID)->pluck('id')->toArray();
    if(!$userContents)
        return $count;

    $student = \App\Models\Sell::whereIn('content_id',$userContents)->count();
    if($student)
        return $student;

    return $count;
}
