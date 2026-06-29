<a class="nav-link waves-effect waves-dark" href="###">
    <div class="d-flex align-items-center">
        <i class="mdi mdi-magnify font-20 mr-1"></i>
        <div class="ml-1 d-none d-sm-block">
            <span>بحث</span>
        </div>
    </div>
</a>
<form class="app-search position-absolute" onsubmit="goToSearchPage(event)" method="get"
    action="{{ route('courses.search') }}">
    @csrf
    @method('get')
    <input type="text" name="q" value="{{ request('q') }}" class="form-control" id="searchInput"
        placeholder="ما المادة التى تريد ان تبحث عنها ؟">
    <button type="submit">
        <a class="srh-btn">
            <i class="ti-close"></i>
        </a>
    </button>
</form>
<script>
function goToSearchPage(event) {
    const input = document.getElementById('searchInput');
    const errorMessage = document.getElementById('search-error');
    if (input.value.trim() === "") {
        event.preventDefault();
        errorMessage.innerText = "من فضلك اكتب كلمة للبحث";
        errorMessage.style.display = "block";
        return false;
    }
    errorMessage.style.display = "none";
    return true;
}
</script>
