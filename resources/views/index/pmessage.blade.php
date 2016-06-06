<div class="row">

    <div class="col-md-7"></div>
    <div class="col-md-5">

        <div id="editor">
            <p>
                <button class="btn btn-sm" v-on:click="photo">
                    <i class="fa fa-picture-o"></i>
                </button>
                <button class="btn btn-sm" v-on:click="header">
                    <i class="fa fa-header"></i>
                </button>
                <button  class="btn btn-sm" v-on:click="list_ol">
                    <i class="fa fa-list-ol"></i>
                </button>
                <button class="btn btn-sm" v-on:click="list_ul">
                    <i class="fa fa-list-ul"></i>
                </button>
                <button class="btn btn-sm" v-on:click="link">
                    <i class="fa fa-link"></i>
                </button>
                <button class="btn btn-sm" v-on:click="italic">
                    <i class="fa fa-italic"></i>
                </button>
                <button class="btn btn-sm" v-on:click="bold">
                    <i class="fa fa-bold"></i>
                </button>
                <button class="btn btn-sm" v-on:click="code">
                    <i class="fa fa-code"></i>
                </button>
                <button class="btn btn-sm" v-on:click="indent">
                    <i class="fa fa-indent "></i>
                </button>

            </p>
            <textarea placeholder="Leave a message" rows="6" style="resize: none" class="form-control" v-model="input" debounce="300"></textarea>
            <input type="hidden" v-model="output">
            <div>@{{{ output }}}</div>
        </div>
    </div>


</div>


<script !src="">
    var converter = new showdown.Converter();
    var editor = new Vue({
        el: '#editor',
        data: {
            input: '## 正在施工中.....',
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

