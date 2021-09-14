@extends('Auth.layout.app')

@section('content')
    <section class="gry-bg py-4">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card">
                            <div class="text-center pt-4">
                                <h1 class="h4 fw-600">
                                    Create an account.
                                </h1>
                            </div>
                            <div class="px-4 py-3 py-lg-4">
                                <div class="">
                                    <form id="reg-form" class="form-default" role="form"
                                          action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   value="{{ old('name') }}" placeholder="Full Name" name="name">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   value="{{ old('email') }}" placeholder="Email" name="email">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   placeholder="Password" name="password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password"
                                                   name="password_confirmation">
                                        </div>
                                        <div class="form-group">
                                            <textarea
                                                   class="form-control{{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                   placeholder="Enter Address" name="address"></textarea>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <select name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">
                                                <option value="">Select City</option>
                                                @foreach(config('city.city') as $key=>$city)
                                                    <option value="{{ $key }}">{{ $city }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('city'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="phone"
                                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   placeholder="Enter Your Phone Number" name="password">
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="aiz-checkbox">
                                                <input type="checkbox" name="checkbox_example_1" required>
                                                <span class=opacity-60>By signing up you agree to our terms and conditions.</span>
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>

                                        <div class="mb-5">
                                            <button type="submit" class="btn btn-primary btn-block fw-600">Create
                                                Account
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mb-0">Already have an account?</p>
                                    <a href="{{ route('login') }}">Log In</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    {{--    @if(get_setting('google_recaptcha') == 1)--}}
    {{--        <script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}
    {{--    @endif--}}

    {{--    <script type="text/javascript">--}}

    {{--        @if(get_setting('google_recaptcha') == 1)--}}
    {{--        // making the CAPTCHA  a required field for form submission--}}
    {{--        $(document).ready(function(){--}}
    {{--            // alert('helloman');--}}
    {{--            $("#reg-form").on("submit", function(evt)--}}
    {{--            {--}}
    {{--                var response = grecaptcha.getResponse();--}}
    {{--                if(response.length == 0)--}}
    {{--                {--}}
    {{--                    //reCaptcha not verified--}}
    {{--                    alert("please verify you are humann!");--}}
    {{--                    evt.preventDefault();--}}
    {{--                    return false;--}}
    {{--                }--}}
    {{--                //captcha verified--}}
    {{--                //do the rest of your validations here--}}
    {{--                $("#reg-form").submit();--}}
    {{--            });--}}
    {{--        });--}}
    {{--        @endif--}}

    {{--        var isPhoneShown = true,--}}
    {{--            countryData = window.intlTelInputGlobals.getCountryData(),--}}
    {{--            input = document.querySelector("#phone-code");--}}

    {{--        for (var i = 0; i < countryData.length; i++) {--}}
    {{--            var country = countryData[i];--}}
    {{--            if(country.iso2 == 'bd'){--}}
    {{--                country.dialCode = '88';--}}
    {{--            }--}}
    {{--        }--}}

    {{--        var iti = intlTelInput(input, {--}}
    {{--            separateDialCode: true,--}}
    {{--            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",--}}
    {{--            onlyCountries: @php echo json_encode(\App\Country::where('status', 1)->pluck('code')->toArray()) @endphp,--}}
    {{--            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {--}}
    {{--                if(selectedCountryData.iso2 == 'bd'){--}}
    {{--                    return "01xxxxxxxxx";--}}
    {{--                }--}}
    {{--                return selectedCountryPlaceholder;--}}
    {{--            }--}}
    {{--        });--}}

    {{--        var country = iti.getSelectedCountryData();--}}
    {{--        $('input[name=country_code]').val(country.dialCode);--}}

    {{--        input.addEventListener("countrychange", function(e) {--}}
    {{--            // var currentMask = e.currentTarget.placeholder;--}}

    {{--            var country = iti.getSelectedCountryData();--}}
    {{--            $('input[name=country_code]').val(country.dialCode);--}}

    {{--        });--}}

    {{--        function toggleEmailPhone(el){--}}
    {{--            if(isPhoneShown){--}}
    {{--                $('.phone-form-group').addClass('d-none');--}}
    {{--                $('.email-form-group').removeClass('d-none');--}}
    {{--                isPhoneShown = false;--}}
    {{--                $(el).html('{{ translate('Use Phone Instead') }}');--}}
    {{--            }--}}
    {{--            else{--}}
    {{--                $('.phone-form-group').removeClass('d-none');--}}
    {{--                $('.email-form-group').addClass('d-none');--}}
    {{--                isPhoneShown = true;--}}
    {{--                $(el).html('Use Email Instead') }}');--}}
    {{--            }--}}
    {{--        }--}}
    {{--    </script>--}}
@endsection
