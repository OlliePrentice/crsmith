<form action="<?php echo home_url(); ?>" class="flex items-center -mx-1 py-2 search-form">
    <div class="px-1 flex-1">
        <label for="searchInput" class="sr-only"><?php _e("Search"); ?></label>
        <input id="searchInput" type="text" name="s" class="input-small rounded-full" placeholder="Enter search term">
    </div>
    <div class="px-1">
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
    </div>
</form>