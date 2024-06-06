@if($size === "md")
<svg width="26px" height="32px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
    <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" r="15" cx="35" cy="100"></circle>
    <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".8" r="15" cx="35" cy="100" style="animation-delay: 0.05s;"></circle>
    <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".6" r="15" cx="35" cy="100" style="animation-delay: 0.1s;"></circle>
    <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".4" r="15" cx="35" cy="100" style="animation-delay: 0.15s;"></circle>
    <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".2" r="15" cx="35" cy="100" style="animation-delay: 0.2s;"></circle>
</svg>
@elseif($size === "xl")
    <svg width="70x" height="70px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" id="canvas-preloader">
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" r="15" cx="35" cy="100"></circle>
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".8" r="15" cx="35" cy="100" style="animation-delay: 0.05s;"></circle>
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".6" r="15" cx="35" cy="100" style="animation-delay: 0.1s;"></circle>
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".4" r="15" cx="35" cy="100" style="animation-delay: 0.15s;"></circle>
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".2" r="15" cx="35" cy="100" style="animation-delay: 0.2s;"></circle>
    </svg>
@else
    <svg width="26px" height="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" r="15" cx="35" cy="100"></circle>
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".8" r="15" cx="35" cy="100" style="animation-delay: 0.05s;"></circle>
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".6" r="15" cx="35" cy="100" style="animation-delay: 0.1s;"></circle>
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".4" r="15" cx="35" cy="100" style="animation-delay: 0.15s;"></circle>
        <circle class="circle" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="15" opacity=".2" r="15" cx="35" cy="100" style="animation-delay: 0.2s;"></circle>
    </svg>
@endif
