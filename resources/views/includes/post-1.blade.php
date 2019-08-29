<hr>
<!-- Blog Comments -->
@if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form" method="POST" action="{{ route('comments.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <textarea class="form-control" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endif
<hr>

<!-- Posted Comments -->
@if(count($comments) > 0)
    <!-- Comment -->
    @foreach ($comments as $comment)
        <div class="media">
            <a class="pull-left" href="#">
                {{-- <img class="media-object" height="64" src="{{ $comment->photo ? $comment->photo : 'http://placehold.it/64x64' }}" alt=""> --}}
                <img class="media-object" height="64" src="{{ $comment->photo ? $comment->photo : Auth::user()->gravatar }}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->author }}
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </h4>
                {{ $comment->body }}
                @if(isset($comment->replies) && count($comment->replies) > 0)
                    @php
                    $isActive = 0;
                    @endphp
                    @foreach ($comment->replies as $reply)
                        @if($reply->is_active == 1)
                        @php
                        $isActive = 1;
                        @endphp
                            <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    {{-- <img class="media-object" height="64" src="{{ $reply->photo ? $reply->photo : 'http://placehold.it/64x64' }}" alt=""> --}}
                                    <img class="media-object" height="64" src="{{ $reply->photo ? $reply->photo : Auth::user()->gravatar }}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $reply->author }}
                                        <small>{{ $reply->created_at->diffForHumans() }}</small>
                                    </h4>
                                    {{ $reply->body }}
                                </div>
                                <div class="comment-reply-container">
                                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                                    <div class="comment-reply col-sm-12">
                                        <div class="well">
                                            <h4>Reply:</h4>
                                            <form role="form" method="POST" action="{{ route('replies.comment') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="body" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- End Nested Comment -->
                        @endif
                    @endforeach
                    @if($isActive == 0)
                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                        <div class="comment-reply">
                            <div class="well">
                                <h4>Reply:</h4>
                                <form role="form" method="POST" action="{{ route('replies.comment') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                    <div class="form-group">
                                        <textarea class="form-control" name="body" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    @endif
                @else
                <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                        <div class="comment-reply">
                            <div class="well">
                                <h4>Reply:</h4>
                                <form role="form" method="POST" action="{{ route('replies.comment') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                    <div class="form-group">
                                        <textarea class="form-control" name="body" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                @endif
            </div>
        </div>
    @endforeach
@endif