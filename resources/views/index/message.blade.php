<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Just a simple markdown</title>
    <script src="//cdn.bootcss.com/showdown/1.4.1/showdown.js"></script>
    <script src="http://cn.vuejs.org/js/vue.js"></script>
    <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <style>
        html, body, #editor {
            margin: 0;
            height: 100%;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #333;
        }

        textarea, #editor div {
            display: inline-block;
            width: 49%;
            height: 100%;
            vertical-align: top;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0 20px;
        }

        textarea {
            border: none;
            border-right: 1px solid #ccc;
            resize: none;
            outline: none;
            background-color: #f6f6f6;
            font-size: 14px;
            font-family: 'Monaco', courier, monospace;
            padding: 20px;
        }

        code {
            color: #f66;
        }
    </style>
</head>
<body>
<form action="">
    <div id="editor">
        <p>
            <button v-click="photo">
                <i class="fa fa-picture-o"></i>
            </button>
            <button v-click="header">
                <i class="fa fa-header"></i>
            </button>
            <button v-click="list_ol">
                <i class="fa fa-list-ol"></i>
            </button>
            <button v-click="list_ul">
                <i class="fa fa-list-ul"></i>
            </button>
            <button v-click="link">
                <i class="fa fa-link"></i>
            </button>
            <button v-click="italic">
                <i class="fa fa-italic"></i>
            </button>
            <button v-click="bold">
                <i class="fa fa-bold"></i>
            </button>
            <button v-click="code">
                <i class="fa fa-code"></i>
            </button>
            <button v-click="indent">
                <i class="fa fa-indent "></i>
            </button>
        </p>

        <textarea v-model="input" debounce="300" name="html"></textarea>
        <input type="hidden" v-model="output">
        <div>@{{{ output }}} @{{ positon }}</div>
    </div>
</form>
<script !src="">
    var converter = new showdown.Converter();

    var editor = new Vue({
        el: '#editor',
        data: {
            input: '#hello world',
            position: null,
            textarea: document.querySelector('textarea')
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
            photo: function (event) {
                this.positionLinstener();
                var first = this.input.substr(0, this.position)
                var last = this.input.substr(this.position, this.input.length)
                this.input = first + '\n![Alt text](/path/to/img.jpg "Optional title")' + last;
                this.textarea.focus();
            },
            header: function (event) {
                this.positionLinstener();
                var first = this.input.substr(0, this.position)
                var last = this.input.substr(this.position, this.input.length)
                this.input = first + '\n# ' + last;
                this.textarea.focus();
            },
            list_ul: function (event) {
                this.positionLinstener();
                var first = this.input.substr(0, this.position)
                var last = this.input.substr(this.position, this.input.length)
                this.input = first + '\n* \n* \n* ' + last;
                this.textarea.focus();
            },
            list_ol: function (event) {
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
                this.input = first + '\n_content_ ' + last;
                this.textarea.focus();
            },
            bold: function (event) {

                this.positionLinstener();
                var first = this.input.substr(0, this.position)
                var last = this.input.substr(this.position, this.input.length)
                this.input = first + '\n__content__ ' + last;
                this.textarea.focus();
            },
            code: function (event) {
                this.positionLinstener();
                var first = this.input.substr(0, this.position)
                var last = this.input.substr(this.position, this.input.length)
                this.input = first + '\n`code`' + last;
                this.textarea.focus();
            },
            code: function (event) {
                this.positionLinstener();
                var first = this.input.substr(0, this.position)
                var last = this.input.substr(this.position, this.input.length)
                this.input = first + '\n`code`' + last;
                this.textarea.focus();
            },
            indent: function (event) {
                this.positionLinstener();
                var first = this.input.substr(0, this.position)
                var last = this.input.substr(this.position, this.input.length)
                this.input = first + '\n> ' + last;
                this.textarea.focus();
            }

        },
        computed: {
            output: function () {
                return converter.makeHtml(this.input)
            }
        }
    });

</script>
</body>
</html>
