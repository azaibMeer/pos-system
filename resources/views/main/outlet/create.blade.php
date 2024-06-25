@extends('layouts.master')
@section('content') 
 <link rel="stylesheet" media="screen, print" href="{{url('assets/css/formplugins/summernote/summernote.css')}}"> 
<div class="row">
    <div class="col-xl-6"> 
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    Outlet Add
                </h2>
                <div class="panel-toolbar">
                   <a href="{{url('/outlet/list')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Outlet List</a>
                </div>
            </div>
            <div class="panel-container show"> 
                <div class="panel-content p-0">
                    <form class="needs-validation" novalidate action="{{url('/outlet/store')}}" method="post">
                    	@csrf
                        <div class="panel-content">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom03">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                    </div>
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustomUsername">Address <span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                             Please provide a valid address.
                                        </div> 
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom03">Contact Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid contact number.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustomUsername">Receipt Header <span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" id="receipt_header" name="receipt_header" placeholder="Receipt Header" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                             Please provide a valid receipt header.
                                        </div> 
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom03">Receipt Footer <span class="text-danger">*</span></label>
                                   <div class="js-summernote" id="saveToLocal"></div>
                                       <input type="hidden" name="saveToLocal" id="content-input">
                                    <div class="invalid-feedback">
                                        Please provide a valid receipt footer.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom03">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1">Active</option> 
                                        <option value="0">InActive</option> 
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid status.
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center justify-content-start">
						    <button class="btn btn-primary" type="submit">Submit</button>
						</div>

                    </form>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function()
                        {
                            'use strict';
                            window.addEventListener('load', function()
                            {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form)
                                {
                                    form.addEventListener('submit', function(event)
                                    {
                                        if (form.checkValidity() === false)
                                        {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();

                    </script>
                </div>
            </div>
        </div> 
    </div> 
</div> 
@endsection
@section('scripts')
<script src="{{url('/assets/js/formplugins/summernote/summernote.js')}}"></script>
<script>
            var autoSave = $('#autoSave');
            var interval;
            var timer = function()
            {
                interval = setInterval(function()
                {
                    //start slide...
                    if (autoSave.prop('checked'))
                        saveToLocal();

                    clearInterval(interval);
                }, 3000);
            };

            //save
            var saveToLocal = function()
            {
                localStorage.setItem('summernoteData', $('#saveToLocal').summernote("code"));
                console.log("saved");
            }

            //delete 
            var removeFromLocal = function()
            {
                localStorage.removeItem("summernoteData");
                $('#saveToLocal').summernote('reset');
            }

            $(document).ready(function()
            {
                //init default
                $('.js-summernote').summernote(
                {
                    height: 200,
                    tabsize: 2,
                    placeholder: "Type here...",
                    dialogsFade: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks:
                    {
                        //restore from localStorage
                        onInit: function(e)
                        {
                            $('.js-summernote').summernote("code", localStorage.getItem("summernoteData"));
                        },
                        onChange: function(contents, $editable)
                        {
                            clearInterval(interval);
                            timer();
                        }
                    }
                });

                //load emojis
                $.ajax(
                {
                    url: 'https://api.github.com/emojis',
                    async: false
                }).then(function(data)
                {
                    window.emojis = Object.keys(data);
                    window.emojiUrls = data;
                });

                //init emoji example
                $(".js-hint2emoji").summernote(
                {
                    height: 100,
                    toolbar: false,
                    placeholder: 'type starting with : and any alphabet',
                    hint:
                    {
                        match: /:([\-+\w]+)$/,
                        search: function(keyword, callback)
                        {
                            callback($.grep(emojis, function(item)
                            {
                                return item.indexOf(keyword) === 0;
                            }));
                        },
                        template: function(item)
                        {
                            var content = emojiUrls[item];
                            return '<img src="' + content + '" width="20" /> :' + item + ':';
                        },
                        content: function(item)
                        {
                            var url = emojiUrls[item];
                            if (url)
                            {
                                return $('<img />').attr('src', url).css('width', 20)[0];
                            }
                            return '';
                        }
                    }
                });

                //init mentions example
                $(".js-hint2mention").summernote(
                {
                    height: 100,
                    toolbar: false,
                    placeholder: "type starting with @",
                    hint:
                    {
                        mentions: ['jayden', 'sam', 'alvin', 'david'],
                        match: /\B@(\w*)$/,
                        search: function(keyword, callback)
                        {
                            callback($.grep(this.mentions, function(item)
                            {
                                return item.indexOf(keyword) == 0;
                            }));
                        },
                        content: function(item)
                        {
                            return '@' + item;
                        }
                    }
                });

            });
             
    $(document).ready(function() { 

        $('form').on('submit', function() {
            $('#content-input').val($('.js-summernote').summernote('code'));
        });
    }); 
        </script>
@endsection
