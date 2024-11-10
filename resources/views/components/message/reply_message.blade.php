<div class="container">
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header bg-info text-white text-center"><h5>Message view</h5></div>
            <div class="card-body">
                <form id="replyForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="hidden" id="message_id" value="{{$message->id}}">
                        <input type="text" class="form-control" id="name" value="{{ $message->name }}" readonly>
                    </div>
            
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $message->email }}" readonly>
                    </div>
            
                    <div class="form-group">
                        <label for="desp">Message Description</label>
                        <textarea style="line-height: 24px;" class="form-control" id="desp" readonly>{{ $message->desp }}</textarea>
                    </div>
            
                    <div class="form-group">
                        <label for="reply">Your Reply</label>
                        <textarea class="form-control" id="reply" {{$message->sts == 1?'readonly':''}}  placeholder="Type your reply here">{{$message->reply}}</textarea>
                    </div>
            
                    @if ($message->sts == 0)
                    <div class="text-center">
                        <button type="button" class="btn btn-info text-white reply_message">Send Reply</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
</div>