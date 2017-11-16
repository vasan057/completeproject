@extends("admin::main")@section('content')<nav class="navbar dexel-coach-navbar2">  <div class="container-fluid">    <div class="navbar-header">      <a class="navbar-brand header-brand" href="#">Dashboard</a>    </div>  </div></nav><div class="dashboardx ">   <div class="container-fluid">      <div class="col-md-10 col-md-offset-1 dashboardx-page">         <div class="dashbaordx-info row">           <div class="dashbaordx-info-left col-md-8 pull-left">               <img src="{{cdn(Auth::guard('admin')->user()->profile->photo)}}" alt="img" class="img-circle text-center">               <span>                 <h2>{{Auth::guard('admin')->user()->fname}} {{Auth::guard('admin')->user()->lname}}</h2>                 <p> @foreach(Auth::guard('admin')->user()->expertise as $expertise)                        {{$expertise->title}},                     @endforeach                  </p>               </span>               <div class="clearboth"></div>            </div>        </div>          @if(Auth::guard('admin')->user()->usertype == 'admin')            <div class="dashbaordx-stats row">               <a href="{{url('coach/upload/audios')}}" class="dashbaordx-stats-each dashbaordx-stats-each-works bg-green col-md-3 col-sm-6 col-sx-12">                  <i class="fa fa-music pull-left"></i>                  <div class="pull-left">                      <h4>{{$count['playlists']}}</h4>                     <p>Playlists</p>                  </div>               </a>               <a href="{{url('coach/all')}}" class="dashbaordx-stats-each bg-orange col-md-3 col-sm-6 col-sx-12">                  <i class="fa fa-user pull-left"></i>                  <div class="pull-left">                      <h4>{{$count['coaches']}}</h4>                     <p>Coaches</p>                  </div>               </a>               <a href="{{url('coach/users/all')}}" class="dashbaordx-stats-each bg-yellow col-md-3 col-sm-6 col-sx-12">                   <i class="fa fa-group pull-left"></i>                  <div class="pull-left">                      <h4>{{$count['users']}}</h4>                     <p>Users</p>                  </div>               </a>               <div class="dashbaordx-stats-each bg-blue col-md-3 col-sm-6 col-sx-12">                   <i class="fa fa-headphones pull-left"></i>                  <div class="pull-left">                      <h4>{{$count['play_count']}}</h4>                     <p>Play Count</p>                  </div>               </div>            </div>          @else            <div class="dashbaordx-stats row">               <a href="{{url('coach/upload/audios')}}" class="dashbaordx-stats-each dashbaordx-stats-each-works bg-green col-md-3 col-sm-6 col-sx-12">                  <i class="fa fa-music pull-left"></i>                  <div class="pull-left">                      <h4>{{$count['playlists']}}</h4>                     <p>Playlists</p>                  </div>               </a>               <div class="dashbaordx-stats-each bg-orange col-md-3 col-sm-6 col-sx-12">                  <i class="fa fa-headphones pull-left"></i>                  <div class="pull-left">                      <h4>{{$count['play_count']}}</h4>                     <p>Play count</p>                  </div>               </div>               <div class="dashbaordx-stats-each bg-yellow col-md-3 col-sm-6 col-sx-12">                   <i class="fa fa-group pull-left"></i>                  <div class="pull-left">                      <h4>{{$count['followers']}}</h4>                     <p>Followers</p>                  </div>               </div>               <div class="dashbaordx-stats-each bg-blue col-md-3 col-sm-6 col-sx-12">                   <i class="fa fa-bullseye pull-left"></i>                  <div class="pull-left">                      <h4>Soon</h4>                     <p>Available</p>                  </div>               </div>            </div>          @endif           <div class="row">              <div class="col-md-12 dashbaordx-feedback">                 <h3 class="pull-left " >Latest Comments</h3>                 <div class="clearboth"></div> </br>                 @foreach($recent['comments'] as $comment)                  <div class="audio-comment-each">                  <div class="audio-comment-each-left">                      <div class="audio-comment-each-author">                        <img src="{{cdn($comment->createdby->profile->photo)}}" width="40" alt="">                        <p>{{$comment->createdby->fname}}<span> {{date('d-m-Y',strtotime($comment->created_at))}}</span></p>                      </div>                  </div>                  <div class="audio-comment-each-right">                    <h3>{{$comment->audio->name}}</h3>                    <p  class="audio-comment-each-comment">{!!$comment->comment!!}</p>                  </div>                  <div class="clearboth"></div>                  </div>                  @endforeach              </div>           </div>      </div>   </div></div>           </div>@stop