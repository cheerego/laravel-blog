@extends('layouts.home')

@section('scripttop')
    <link rel="stylesheet" href=" {{ asset('bower_components') }}/select2/dist/css/select2.min.css">
    <style>
        #editor {
            background-color: #f6f6f6;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 3px; /* W3C syntax */
        }

        .icon {
            margin: auto 2px;
            display: inline-block;
            padding: 0;
            cursor: pointer;
            border: 0;
            background-color: white;
            width: 20px;
            height: 20px;
            background-repeat: no-repeat;
            background-size: 380px 60px;
            background-image: url({{ asset('image').'/editor@2x.png' }});
        }

        #editor > p {
            background-color: white;
            margin: 0 auto;
            padding: 5px;
            border-bottom: 1px solid #ccc;
        }

        #editor > textarea {
            outline: none;
            background-color: white;
            font-size: 14px;
            font-family: 'Monaco', courier, monospace;
            display: inline-block;
            border: 0;
            padding: 1px;
            width: 50%;
            resize: none;
        }

        #editor > div {
            margin: 0;
            display: inline-block;
            background-color: #f6f6f6;
            vertical-align: top;
            width: 49%;
            height: 100%;
            min-height: 320px;
        }

        .icon-bold {
            background-position: 0px 0px;
        }

        .icon-italic {
            background-position: -20px 0px;
        }

        .icon-link {
            background-position: -40px 0px;
        }

        .icon-colon {
            background-position: -60px 0px;
        }

        .icon-code {
            background-position: -80px 0px;
        }

        .icon-photo {
            background-position: -100px 0px;
        }

        .icon-ul {
            background-position: -120px 0px;
        }

        .icon-ol {
            background-position: -140px 0px;
        }

        .icon-title {
            background-position: -160px 0px;
        }

        .icon-hr {
            background-position: -180px 0px;
        }

        .icon-right {
            float: right;
            background-position: -320px 0px;
        }

        .icon-center {
            float: right;
            background-position: -340px 0px;
        }

        .icon-left {
            float: right;
            background-position: -360px 0px;
        }

        .icon-bold:hover {
            background-position: 0px -40px;
        }

        .icon-italic:hover {
            background-position: -20px -40px;
        }

        .icon-link:hover {
            background-position: -40px -40px;
        }

        .icon-colon:hover {
            background-position: -60px -40px;
        }

        .icon-code:hover {
            background-position: -80px -40px;
        }

        .icon-photo:hover {
            background-position: -100px -40px;
        }

        .icon-ul:hover {
            background-position: -120px -40px;
        }

        .icon-ol:hover {
            background-position: -140px -40px;
        }

        .icon-title:hover {
            background-position: -160px -40px;
        }

        .icon-hr:hover {
            background-position: -180px -40px;
        }

        .icon-right:hover {
            background-position: -320px -40px;
        }

        .icon-center:hover {
            background-position: -340px -40px;
        }

        .icon-left:hover {
            background-position: -360px -40px;
        }


    </style>
@endsection

@section('content')
    <form action="{{ action('ArticlesController@update',[$article->id]) }}" method="post">
        <input type="text" placeholder="Title" class="form-control" name="title" required value="{{ $article->title }}">
        类别:
        <select class="form-control" name="category">
            @foreach($categorys as $category )
                <option value="{{ $category->id }}"
                        @if($category->id == $article->category_id)
                        selected
                        @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <div id="editor">
            <p>
                <a @click="bold" class="icon icon-bold"></a>
                <a @click="italic" class="icon icon-italic"></a>
                <a @click="link" class="icon icon-link"></a>
                <a @click="colon" class="icon icon-colon"></a>
                <a @click="code" class="icon icon-code"></a>
                <a @click="photo" class="icon icon-photo"></a>
                <a @click="ul" class="icon icon-ul"></a>
                <a @click="ol" class="icon icon-ol"></a>
                <a @click="title" class="icon icon-title"></a>
                <a @click="hr" class="icon icon-hr"></a>
                <a @click="left" class="icon icon-left"></a>
                <a @click="center" class="icon icon-center"></a>
                <a @click="right" class="icon icon-right"></a>
            </p>

            <textarea v-model="input" debounce="500" style="display: inline-block" rows="16" autofocus required >
                {{ $article->content }}
            </textarea>
            <input type="hidden" name="content" v-model="input">
            <input type="hidden" name="html" v-model="output">
            <div>@{{{ output }}}</div>
        </div>
        <label for="" class="label label-success">Tags:</label>
        <select id="select" class="form-control" name="tags[]" multiple >
            @foreach($tags as $tag)
                    <option value="{{$tag->id}}"><span class="label label-inverse">{{$tag->name}}</span></option>
            @endforeach
        </select>
        <input type="submit" value="Submit" class="btn btn-block btn-success btn-raised">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
    </form>
    <textarea style="display: none" id="content" cols="30" rows="10">{{ $article->content }}</textarea>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection


@section('scriptbottom')
    <script type="text/javascript" src="{{ asset('bower_components') }}/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/select2/dist/js/select2.full.min.js"></script>
    <script src="//cdn.bootcss.com/showdown/1.4.1/showdown.js"></script>
    <script src="{{ asset('vue-csp') }}/vue.js"></script>
@endsection


@section('scriptcode')
    <script !src="">
        function escape2Html(str) {
            var arrEntities={'lt':'<','gt':'>','nbsp':' ','amp':'&','quot':'"'};
            return str.replace(/&(lt|gt|nbsp|amp|quot);/ig,function(all,t){return arrEntities[t];});
        }
        var $content = document.querySelector('#content');
        var articlecontent = $content.innerHTML;
        var editor = new Vue({
            el: '#editor',
            data: {
                input:'',
                position: null,
                textarea: document.querySelector('textarea'),
                converter : new showdown.Converter(),
            },
            methods: {
                positionLinstener: function () {
                    if (document.selection) {
                        this.textarea.focus();
                        var Sel = document.selection.createRange();
                        Sel.moveStart('character', -this.textarea.value.length);
                        CaretPos = Sel.text.length;
                    }
                    // Firefox support
                    else if (this.textarea.selectionStart || this.textarea.selectionStart == '0') {
                        CaretPos = this.textarea.selectionStart;
                    }
                    this.position = CaretPos;
                },
                colon: function (event) {
                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '> 引用文字' + last;
                    this.textarea.focus();
                },
                photo: function (event) {
                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '\n![Alt text](/path/to/img.jpg "Optional title")' + last;
                    this.textarea.focus();
                },
                title: function (event) {
                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '\n标题文字 \n====' + last;
                    this.textarea.focus();
                },
                ul: function (event) {
                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '\n* \n* \n* ' + last;
                    this.textarea.focus();
                },
                ol: function (event) {
                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '\n1. \n2. \n3. ' + last;
                    this.textarea.focus();
                },
                link: function (event) {
                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '[an example](http://example.com/ "Title") ' + last;
                    this.textarea.focus();
                },
                italic: function (event) {

                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '*斜体文字*' + last;
                    this.textarea.focus();
                },
                bold: function (event) {
                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '**加粗文字**' + last;
                    this.textarea.focus();
                },
                code: function (event) {
                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '\n```请输入代码```' + last;
                    this.textarea.focus();
                },

                hr: function (event) {
                    this.positionLinstener();
                    var first = this.input.substr(0, this.position)
                    var last = this.input.substr(this.position, this.input.length)
                    this.input = first + '\n___\n' + last;
                    this.textarea.focus();
                },
                center: function (event) {
                    var output = document.querySelector('#editor>div')
                    this.textarea.style.display = 'inline-block'
                    output.style.display = 'inline-block'
                    this.textarea.style.width = '50%'
                    output.style.width = '49%'
                },
                left: function (event) {
                    var output = document.querySelector('#editor>div')
                    this.textarea.style.display = 'inline-block'
                    output.style.display = 'inline-block'
                    this.textarea.style.width = '50%'
                    output.style.width = '490%'

                    this.textarea.style.display = 'none'
                    output.style.width='100%'

                },
                right: function (event) {
                    var output = document.querySelector('#editor>div')
                    this.textarea.style.display = 'inline-block'
                    output.style.display = 'inline-block'
                    this.textarea.style.width = '50%'
                    output.style.width = '49%'

                    output.style.display = 'none'
                    this.textarea.style.width='100%'
                }

            },
            computed: {
                output: function () {
                    return this.converter.makeHtml(this.input)
                }
            }
        });


        var autoTextarea = function (elem, extra, maxHeight) {
            extra = extra || 0;
            var isFirefox = !!document.getBoxObjectFor || 'mozInnerScreenX' in window,
                    isOpera = !!window.opera && !!window.opera.toString().indexOf('Opera'),
                    addEvent = function (type, callback) {
                        elem.addEventListener ?
                                elem.addEventListener(type, callback, false) :
                                elem.attachEvent('on' + type, callback);
                    },
                    getStyle = elem.currentStyle ? function (name) {
                        var val = elem.currentStyle[name];

                        if (name === 'height' && val.search(/px/i) !== 1) {
                            var rect = elem.getBoundingClientRect();
                            return rect.bottom - rect.top -
                                    parseFloat(getStyle('paddingTop')) -
                                    parseFloat(getStyle('paddingBottom')) + 'px';
                        }
                        ;

                        return val;
                    } : function (name) {
                        return getComputedStyle(elem, null)[name];
                    },
                    minHeight = parseFloat(getStyle('height'));

            elem.style.resize = 'none';

            var change = function () {
                var scrollTop, height,
                        padding = 0,
                        style = elem.style;

                if (elem._length === elem.value.length) return;
                elem._length = elem.value.length;

                if (!isFirefox && !isOpera) {
                    padding = parseInt(getStyle('paddingTop')) + parseInt(getStyle('paddingBottom'));
                }
                ;
                scrollTop = document.body.scrollTop || document.documentElement.scrollTop;

                elem.style.height = minHeight + 'px';
                if (elem.scrollHeight > minHeight) {
                    if (maxHeight && elem.scrollHeight > maxHeight) {
                        height = maxHeight - padding;
                        style.overflowY = 'auto';
                    } else {
                        height = elem.scrollHeight - padding;
                        style.overflowY = 'hidden';
                    };
                    style.height = height + extra + 'px';
                    scrollTop += parseInt(style.height) - elem.currHeight;
                    document.body.scrollTop = scrollTop;
                    document.documentElement.scrollTop = scrollTop;
                    elem.currHeight = parseInt(style.height);
                }
                ;
            };

            addEvent('propertychange', change);
            addEvent('input', change);
            addEvent('focus', change);
            change();
        };
        var text = document.querySelector('#editor>textarea');
        //    var text = document.getElementsByTagName('textarea');
        autoTextarea(text);// 调用
        $('#select').select2({
                    tags: true,
                    placeholder: "Tags",
                }
        );





    </script>


@endsection



