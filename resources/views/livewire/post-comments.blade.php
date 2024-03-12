<div class="pt-10 mt-10 border-t border-gray-100 comments-box">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion
            ({{ $comments->count() }})</h2>
    </div>

    @include('livewire.partials.comment-form', [
        'method' => 'postComment',
        'state' => 'newCommentState',
        'inputId' => 'comment',
        'inputLabel' => 'Your comment',
        'button' => 'Post comment',
    ])

    <div class="px-3 py-2 mt-5 user-comments">
        @forelse($comments as $comment)
            <livewire:comment :$comment :key="$comment->id" />
        @empty
            <div class="text-center text-gray-500">
                <span> No Comments Posted</span>
            </div>
        @endforelse
    </div>
    <div class="my-2">
        {{ $comments->links() }}
    </div>
</div>
