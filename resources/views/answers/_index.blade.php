<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body text-justify">
                <div class="card-title">
                    <h2>{{ $question->answers_count . " " . str_plural('Answer', $question->answers_count) }}</h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach($question->answers as $answer)
                    <div class="media">
                        <div class="d-flex d-flex-column vote-controls mr-3">
                            <div>
                                <!-- <a href="" title="This question is useful" class="vote-up">
                                    <i class="material-icons md-46 text-primary">arrow_drop_up</i>
                                </a> 
                                <div class="votes-coutn md-10 text-muted text-center">123</div>

                                <div class="text-align-center">
                                    <a href="" title="This question is not useful" class="vote-down off">
                                        <i class="material-icons md-46 text-primary">arrow_drop_down</i>
                                    </a>
                                </div> -->
                                <a href="" 
                                    title="This answer is useful" 
                                    class="vote-up"
                                    onclick="event.preventDefault(); 
                                                document.getElementById('up-vote-answer-{{ $answer->id }}').submit();">
                                        <i class="material-icons md-46 text-primary {{ Auth::guest() ? 'off' : '' }}">
                                            arrow_drop_up
                                        </i>
                                </a>
                                <form id="up-vote-answer-{{ $answer->id }}" 
                                        action="/answers/{{ $answer->id }}/vote" 
                                        method="post" 
                                        style="display: none;">
                                    @csrf
                                    <input type="hidden" name="vote" value="1">
                                </form>

                                <div class="votes-coutn md-10 text-muted text-center">
                                    {{ $answer->votes_count }}
                                </div> 

                                <div class="text-align-center">
                                    <a href="" 
                                        title="This answer is not useful" 
                                        class=""
                                        onclick="event.preventDefault(); 
                                                document.getElementById('down-vote-answer-{{ $answer->id }}').submit();">
                                        <i class="material-icons md-46 text-primary {{ Auth::guest() ? 'off' : '' }}">
                                            arrow_drop_down
                                        </i>
                                    </a>
                                    <form id="down-vote-answer-{{ $answer->id }}" 
                                        action="/answers/{{ $answer->id }}/vote" 
                                        method="post" 
                                        style="display: none;">
                                    @csrf
                                    <input type="hidden" name="vote" value="-1">
                                    </form> 
                                </div>

                                <br>
                                @can('accept', $answer)
                                <div class="text-center">
                                    
                                    <a href="" title="Click to mark as best answer"
                                        onclick="event.preventDefault(); 
                                                document.getElementById('accept-answer-{{ $answer->id }}').submit();">
                                        <i class="material-icons md-36 {{ $answer->status }} text-gray">check</i>
                                    </a> 
                                </div>
                                <form id="accept-answer-{{ $answer->id }}" action="{{ route('answers.accept', $answer->id) }}" method="post" style="display: none;">
                                    @csrf
                                </form>
                                @else
                                    @if($answer->is_best)
                                        <a title="This answer has been acceptded as best answers by the owner of the question">
                                            <i class="material-icons md-36 {{ $answer->status }} text-gray">check</i>
                                        </a> 
                                    @endif
                                @endcan
                                <div class="text-center">
                                    <span class="favorites-count md-10 text-muted"></span>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto">
                                        @if(Auth::user()->can('update', $answer))
                                            <a href="{{ route('questions.answers.edit', [$question->id, $answer->id] )}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endif
                                        @if(Auth::user()->can('delete', $answer))
                                        <form method="post" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    
                                </div>
                                <div class="col-4">
                                    <div class="float-right">
                                        <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                        <div class="media mt-2">
                                            <a href="{{ $answer->user->url }}" class="pr-2">
                                                <img src="{{ $answer->user->avatar }}" alt="">
                                            </a>
                                            <div class="media-body mt-1">
                                                <a href="{{ $answer->user->url }}">
                                                    {{ $answer->user->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>