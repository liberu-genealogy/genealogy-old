<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
            <tr>
                <td class="content-cell" align="center">
                    <p>
                    @if(config('liberu.config.facebook'))
                        <a href="{{ config('liberu.config.facebook') }}">
                            <img src="{{ url('images/emails/facebook.gif') }}" alt="facebook">
                        </a>
                    @endif
                    @if(config('liberu.config.googleplus'))
                        <a href="{{ config('liberu.config.googleplus') }}">
                            <img src="{{ url('images/emails/googleplus.gif') }}" alt="googleplus">
                        </a>
                    @endif
                    @if(config('liberu.config.twitter'))
                        <a href="{{ config('liberu.config.twitter') }}">
                            <img src="{{ url('images/emails/twitter.gif') }}" alt="twitter">
                        </a>
                    @endif
                    </p> 
                    {{ Illuminate\Mail\Markdown::parse($slot) }}
                </td>
            </tr>
        </table>
    </td>
</tr>
