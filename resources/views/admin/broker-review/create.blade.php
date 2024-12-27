@extends('admin.layouts.app_admin')
@section('styles')


<style>
    .ck-editor__editable[role="textbox"] {
        min-height: 300px;
    }

    .ck .ck-sticky-panel .ck-sticky-panel__content_sticky {
        z-index: 99999 !important;
        margin-top: 0px;
    }

    @media only screen and (min-width: 320px) and (max-width: 768px) {

        .ck .ck-sticky-panel .ck-sticky-panel__content_sticky {
            margin-top: 0px;
        }
    }
</style>
@endsection
@section('content')
    <main id="main" class="main">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="pagetitle">
            <h1>Broker Review</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Broker Review</li>
                    <li class="breadcrumb-item active">Add Broker Review</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('broker-review.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title">Review Details</h5>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="title">Title *</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                placeholder="Enter title" value="{{ old('title') }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="category">Category *</label>
                                            <select name="category" class="form-control" id="category">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="bestForexes">Best Forex</label>
                                            <select name="bestForexes" class="form-control" id="bestForexes" onchange="bestForexesCategory(this)">
                                                <option value="">Select Category</option>
                                                @foreach ($bestForexes as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('bestForexes')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="bestForexesSubCat_id">Best Forex Position</label>
                                            <select name="bestForexesSubCat_id" class="form-control" id="bestForexesSubCat_id" disabled>
                                                <option value="">Select Position</option>
                                            </select>
                                            @error('bestForexesSubCat_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>





                                    {{-- <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="subcategory">Sub-Category *</label>
                                            <select name="subcategory" class="form-control" id="subcategory" disabled>
                                                <option value="">Select Sub-Category</option>
                                            </select>
                                            @error('subcategory')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="title">Short Description *</label>
                                    <textarea name="short_description" id="short_description" rows="5" class="form-control" placeholder="Enter short description">{{ old('short_description') }}</textarea>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>




                                <div class="row">
                                    <h5 class="card-title">Brokers Highlights</h5>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="brokers_name">Broker Name *</label>
                                            <input type="text" class="form-control" name="brokers_name" id="brokers_name"
                                                placeholder="Enter brokers name" value="{{ old('brokers_name') }}">
                                            @error('brokers_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="trading_desk">Trading Desk *</label>
                                            <input type="text" class="form-control" name="trading_desk" id="trading_desk"
                                                placeholder="Enter trading desk" value="{{ old('trading_desk') }}">
                                            @error('trading_desk')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="year_founded">Year Founded *</label>
                                            <input type="text" class="form-control" name="year_founded" id="year_founded"
                                                placeholder="Enter Year Founded" value="{{ old('year_founded') }}">
                                            @error('year_founded')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="headquarters">Headquarters *</label>
                                            <input type="text" class="form-control" name="headquarters" id="headquarters"
                                                placeholder="Enter Headquarters" value="{{ old('headquarters') }}">
                                            @error('headquarters')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="regulation">Regulation *</label>
                                            <input type="text" class="form-control" name="regulation" id="regulation"
                                                placeholder="Enter Regulation" value="{{ old('regulation') }}">
                                            @error('regulation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="us_clients">US Clients *</label>
                                            <input type="text" class="form-control" name="us_clients" id="us_clients"
                                                placeholder="Enter US Clients" value="{{ old('us_clients') }}">
                                            @error('us_clients')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="support_email">Support Email *</label>
                                            <input type="text" class="form-control" name="support_email" id="support_email"
                                                placeholder="Enter Support Email" value="{{ old('support_email') }}">
                                            @error('support_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="telephone">Telephone *</label>
                                            <input type="text" class="form-control" name="telephone" id="telephone"
                                                placeholder="Enter Telephone" value="{{ old('telephone') }}">
                                            @error('telephone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="address">Address *</label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="Enter Address" value="{{ old('address') }}">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="languages">Languages *</label>
                                            <input type="text" class="form-control" name="languages" id="languages"
                                                placeholder="Enter Languages" value="{{ old('languages') }}">
                                            @error('languages')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" id="support_247" name="support_247" {{ old('support_247') == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="support_247">247 Support</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <h5 class="card-title">Accounts Details</h5>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="commission">Commission *</label>
                                            <input type="text" class="form-control" name="commission" id="commission"
                                                placeholder="Enter Commission" value="{{ old('commission') }}">
                                            @error('commission')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="accounts">Accounts *</label>
                                            <input type="text" class="form-control" name="accounts" id="accounts"
                                                placeholder="Enter Accounts" value="{{ old('accounts') }}">
                                            @error('accounts')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="min_deposit">Min. Deposit *</label>
                                            <input type="text" class="form-control" name="min_deposit" id="min_deposit"
                                                placeholder="Enter min deposit" value="{{ old('min_deposit') }}">
                                            @error('min_deposit')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="currencies">Currencies *</label>
                                            <input type="text" class="form-control" name="currencies" id="currencies"
                                                placeholder="Enter Currencies" value="{{ old('currencies') }}">
                                            @error('currencies')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="execution">Execution *</label>
                                            <input type="text" class="form-control" name="execution" id="execution"
                                                placeholder="Enter Execution" value="{{ old('execution') }}">
                                            @error('execution')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="leverage">Leverage *</label>
                                            <input type="text" class="form-control" name="leverage" id="leverage"
                                                placeholder="Enter leverage" value="{{ old('leverage') }}">
                                            @error('leverage')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="spreads">Spreads *</label>
                                            <input type="text" class="form-control" name="spreads" id="spreads"
                                                placeholder="Enter Spreads" value="{{ old('spreads') }}">
                                            @error('spreads')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="trade_size">Trade Size *</label>
                                            <input type="text" class="form-control" name="trade_size" id="trade_size"
                                                placeholder="Enter Trade Size" value="{{ old('trade_size') }}">
                                            @error('trade_size')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="instruments">Instruments *</label>
                                            <input type="text" class="form-control" name="instruments" id="instruments"
                                                placeholder="Enter Instruments" value="{{ old('instruments') }}">
                                            @error('instruments')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" id="demo_trading" name="demo_trading" {{ old('demo_trading') == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="demo_trading"> Demo Trading </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" id="swap_free" name="swap_free" {{ old('swap_free') == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="swap_free">Swap-Free</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" id="copy_trading" name="copy_trading" {{ old('copy_trading') == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="copy_trading">CopyTrading</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" id="crypto_trading" name="crypto_trading" {{ old('crypto_trading') == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="crypto_trading">Crypto Trading</label>
                                        </div>
                                    </div>




                                </div>

                                <div class="row">
                                    <h5 class="card-title">Platforms</h5>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="platform">Platform *</label>
                                            <input type="text" class="form-control" name="platform" id="platform"
                                                placeholder="Enter Platform" value="{{ old('platform') }}">
                                            @error('platform')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" id="mobile_trading" name="mobile_trading" {{ old('mobile_trading') == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="mobile_trading"> Mobile Trading </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" id="web_trading" name="web_trading" {{ old('web_trading') == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="web_trading"> Web Trading </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" id="affiliate" name="affiliate" {{ old('affiliate') == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="affiliate"> Affiliate </label>
                                        </div>
                                    </div>




                                </div>

                                <div class="row">
                                    <h5 class="card-title">Funding</h5>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="platform">Deposit *</label>
                                            <textarea name="deposit" id="deposit" rows="5" class="form-control" placeholder="Enter deposit">{{ old('deposit') }}</textarea>
                                            @error('deposit')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="withdrawal">Withdrawal *</label>
                                            <textarea name="withdrawal" id="withdrawal" rows="5" class="form-control" placeholder="Enter withdrawal">{{ old('withdrawal') }}</textarea>
                                            @error('withdrawal')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="description">Description *</label>
                                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="yes" id="brokerCategory1" name="bcategory_1" {{ old('bcategory_1') == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brokerCategory1">
                                            {{ getBrokerCategory(1)->name }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="yes" id="brokerCategory2" name="bcategory_2" {{ old('bcategory_2') == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brokerCategory2">
                                            {{ getBrokerCategory(2)->name }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="yes" id="brokerCategory3" name="bcategory_3" {{ old('bcategory_3') == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brokerCategory3">
                                            {{ getBrokerCategory(3)->name }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="yes" id="brokerCategory4" name="bcategory_4" {{ old('bcategory_4') == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brokerCategory4">
                                            {{ getBrokerCategory(4)->name }}
                                        </label>
                                    </div>
                                </div>



                                <h5 class="card-title">Broker Details</h5>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label class="control-label pt-2" for="website_link">Website Link *</label>
                                        <input type="text" class="form-control" name="website_link" id="website_link"
                                            placeholder="Enter website link" value="{{ old('website_link') }}">
                                        @error('website_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label class="control-label pt-2" for="review">Review *</label>
                                        <input type="number" min="0.1" step="0.1" class="form-control" name="review" id="review"
                                            placeholder="Enter review" value="{{ old('review') }}">
                                        @error('review')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label class="control-label pt-2" for="total_ratings">Total Ratings *</label>
                                        <input type="number" min="1" step="1" class="form-control" name="total_ratings" id="total_ratings"
                                            placeholder="Enter total ratings" value="{{ old('total_ratings') }}">
                                        @error('total_ratings')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label pt-2" for="logo">Logo</label>
                                        <input type="file" class="form-control" name="logo" id="logo">
                                        @error('logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Save & Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>


<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("short_description"), {
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        placeholder: 'Enter description',
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        htmlEmbed: {
            showPreviews: true
        },
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                    '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                    '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                    '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        removePlugins: [
            'CKBox',
            'CKFinder',
            'EasyImage',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            'MathType'
        ]
    });
</script>
<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        placeholder: 'Enter description',
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        htmlEmbed: {
            showPreviews: true
        },
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                    '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                    '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                    '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        removePlugins: [
            'CKBox',
            'CKFinder',
            'EasyImage',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            'MathType'
        ]
    });
</script>

<script>

    function bestForexesCategory(el){
        var catId = $(el).val();
        if (catId == '') {
            $('#bestForexesSubCat_id').prop('disabled', true);
        } else {
            $('#bestForexesSubCat_id').removeAttr('disabled');
        }
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.getPositionSubCategory') }}',
            data: {
                catId: catId
            },
            success: function(data) {
                $('#bestForexesSubCat_id').html(data);
                // console.log(data);

            },
        });
    }
</script>
@endsection
