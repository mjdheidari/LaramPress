@extends('layouts.PagesTheme')
@section('tab-title')
    تماس با ما
@endsection

@section('style')

@endsection

@section('title')
    تماس با ما
@endsection

@section('content')
    <div class="contact">
        <div class="contact_right">
            <div class="contact_info">
                <h3>اینجا را پیدا کنید</h3>
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1352.1663824386608!2d59.614820320281574!3d36.287764418150594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6c911abe4131d7%3A0xc9c57e3a9318753b!2sMashhad%2C%20Razavi%20Khorasan%20Province%2C%20Iran!5e0!3m2!1sen!2sus!4v1584616095401!5m2!1sen!2sus"
                        width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <br><small>
                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1352.1663824386608!2d59.614820320281574!3d36.287764418150594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6c911abe4131d7%3A0xc9c57e3a9318753b!2sMashhad%2C%20Razavi%20Khorasan%20Province%2C%20Iran!5e0!3m2!1sen!2sus!4v1584616095401!5m2!1sen!2sus"
                           style="font-family: 'Open Sans', sans-serif;color:#555555;text-shadow:0 1px 0 #ffffff; text-align:right;font-size:12px;padding: 5px;">مشاهده
                            نقشه بزرگتر</a></small>
                </div>
            </div>
            <div class="company_address">
                <h3>اطلاعات شرکت :</h3>
                {!! $data !!}
            </div>
        </div>
        <div class="contact_left">
            <div class="contact-form">
                <h3>تماس با ما</h3>
                <form method="post" action="contact-post.html">
                    <div>
                        <span><label>نام</label></span>
                        <span><input name="userName" type="text" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>ایمیل</label></span>
                        <span><input name="userEmail" type="text" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>موبایل</label></span>
                        <span><input name="userPhone" type="text" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>موضوع</label></span>
                        <span><textarea name="userMsg"> </textarea></span>
                    </div>
                    <div>
                        <span><input type="submit" value="ارسال"></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endsection


