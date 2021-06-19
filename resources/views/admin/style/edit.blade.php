@extends('admin.layouts.app')


@section('title', 'Create new style')

@section('pageTitle', 'Create Style')

@section('content')
    <div class="p-3">
        <form action="{{ route('admin.style.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="style">Style Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="style" name="style" placeholder="Style name..">
                    @error('style')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="row mb-0 mt-1 pb-0">
                <div class="col-25">
                    <label for="style">Apply to</label>
                </div>
                <div class="col-75">

                    <table id="tbUser" class=" w-100">
                        <tr class=" d-flex justify-content-between">
                            <td row-span="1" class="applyTo">
                                <select onchange="dataChange()" name="applyToPatern" class="applyToForm">
                                    <option value="url">Url </option>
                                    <option value="domain">Domain </option>
                                    <option value="url-prefix">Url prefix </option>
                                    <option value="regexp">Regular expression </option>
                                </select>
                            </td>
                            <td row-span="3" class="applyPattern">
                                <input onkeyup="dataChange()" type="text" class="applyToForm" placeholder="Write here"
                                    id="option" name="applytoText">

                            </td>
                            <td row-span="1" class="applyBtn">
                                <button onclick="addRow(this)" type="button"
                                    class="addRow applyToForm btn btn-success d-inline"> + </button>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>

            <p id="shere"></p>

            <div class="row mt-0 mb-3 pt-0">
                <div class="col-25">
                    <label for="flug">Select photo</label>
                </div>
                <div class="col-75 pt-2">
                    <input type="file" id="photo" name="photo" class="form-control">
                </div>
            </div>


            <div class="row my-2">
                <div class="col-25">
                    <label for="subject">Styles</label>
                </div>
                <div class="col-75">
                    <textarea id="codearea" name="codearea"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                </div>
                <div class="col-75">
                    <div class="col-25">
                    </div>
                    <div class="col-75 text-right">
                        <button class="btn btn-dark pull-left my-4 mx-2 py-2 px-5 rounded" type="submit" name="subscription"
                            value="free">Free</button>
                        <button class="btn btn-success my-4 mx-2 py-2 px-5 rounded" type="submit" name="subscription"
                            value="premium">Premium</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection



@push('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.61.1/mode/css/css.min.js"></script>

    <style>
        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 15%;
            margin-top: 6px;
        }

        .col-35 {
            float: left;
            width: 35%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 85%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        .applyToForm {
            margin: 0 !important;
            padding: 2px 8px !important;
            outline: none !important;
        }

        .applyTo {
            width: 30% !important;
        }

        .applyPattern {
            width: 60% !important;
        }

        .applyBtn {
            width: 60px !important;
        }



        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }

    </style>
@endpush

@push('script')
    <script type="text/javascript">
        const codemirrorEditor = CodeMirror.fromTextArea(document.getElementById('codearea'), {
            lineNumbers: true,
            mode: "css",
            autoCloseTags: true,
        });
        codemirrorEditor.setSize("1000", "1200");

        $(".CodeMirror").keyup(function() {
            styleEdited();
        });

    </script>

    <script type="text/javascript" src="{{ asset('backend/dist/js/codemirrorfunction.js') }}"></script>
@endpush
