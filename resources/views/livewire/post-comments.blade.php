<div class="comments-box mt-10 border-t border-gray-100 w-3/4">
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-lg font-bold text-gray-900 lg:text-2xl dark:text-white">
            Discussion ({{ $comments->count() }})
        </h2>
    </div>

    @include(
        "livewire.partials.comment-form",
        [
            "method" => "postComment",
            "state" => "newCommentState",
            "inputId" => "comment",
            "inputLabel" => "Your comment",
            "button" => "Post comment",
        ]
    )

    <div class="user-comments mt-5 px-3 py-2">
        @forelse ($comments as $comment)
            <livewire:comment :$comment :key="$comment->id" />
        @empty
            <div class="text-center text-gray-500">
                <span>No Comments Posted</span>
            </div>
        @endforelse
    </div>
    <div class="my-2">
        {{ $comments->links() }}
    </div>
</div>
