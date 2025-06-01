<!-- <div class="box__contract">
    <a class="icon__hover" href="">
        <div class="icon__contract icon__mail">
            <i class="contract_hover fas fa-envelope"></i>
            <a class="contract__icon_hide" href="d">Email</a>
        </div>
    </a>
    <a class="icon__hover" href="">
        <div class="icon__contract icon__mail">
            <i class="contract_hover  fas fa-phone"></i>
            <a class="contract__icon_hide" href="">Phone</a>
        </div>
    </a>
    <a class="icon__hover" href="">
        <div class="icon__contract icon__mail">
            <i class="contract_hover fab fa-facebook-f"></i>
            <a class="contract__icon_hide" href="">Facebook</a>
        </div>
    </a>
</div> -->
<div>
    <button id="back-to-top" style="position:fixed;bottom:40px;right:40px;display:none;z-index:999;border:none;background:#4643D0;color:#ffffff;padding:12px 18px;border-radius:50%;font-size:22px;box-shadow:0 2px 8px rgba(0,0,0,1);">
        <i class="fas fa-arrow-up"></i>
    </button>
</div>
<script>
window.addEventListener('scroll', function() {
    document.getElementById('back-to-top').style.display = (window.scrollY > 200) ? 'block' : 'none';
});
document.getElementById('back-to-top').onclick = function() {
    window.scrollTo({top: 0, behavior: 'smooth'});
};
</script>