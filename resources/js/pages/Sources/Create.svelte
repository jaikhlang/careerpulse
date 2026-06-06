<script lang="ts">
    import { useForm } from '@inertiajs/svelte';

    const form = useForm({
        name: '',
        slug: '',
        base_url: '',
        type: 'government',
        crawl_interval: 60,
        is_active: true,
    });

    const submit = () => {
        console.log(form);
        form.post(route('sources.store'));
    };
</script>

<div class="mx-auto w-full max-w-3xl px-4 py-8 sm:px-6 lg:px-8">
    <div
        class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"
    >
        <div class="border-b border-slate-200 px-6 py-5 sm:px-8">
            <h1 class="text-xl font-semibold tracking-tight text-slate-900">
                Create Source
            </h1>
            <p class="mt-1 text-sm text-slate-600">
                Add a crawl source and configure how frequently it should run.
            </p>
        </div>

        <form
            class="space-y-6 px-6 py-6 sm:px-8"
            on:submit|preventDefault={submit}
        >
            <div class="grid gap-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label
                        class="mb-2 block text-sm font-medium text-slate-700"
                        for="name">Name</label
                    >
                    <input
                        id="name"
                        bind:value={form.name}
                        class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-200"
                        placeholder="e.g. SSC Jobs"
                        type="text"
                    />
                    {#if form.errors.name}
                        <p class="mt-1 text-sm text-rose-600">
                            {form.errors.name}
                        </p>
                    {/if}
                </div>

                <div>
                    <label
                        class="mb-2 block text-sm font-medium text-slate-700"
                        for="slug">Slug</label
                    >
                    <input
                        id="slug"
                        bind:value={form.slug}
                        class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-200"
                        placeholder="ssc-jobs"
                        type="text"
                    />
                    {#if form.errors.slug}
                        <p class="mt-1 text-sm text-rose-600">
                            {form.errors.slug}
                        </p>
                    {/if}
                </div>

                <div>
                    <label
                        class="mb-2 block text-sm font-medium text-slate-700"
                        for="type">Type</label
                    >
                    <select
                        id="type"
                        bind:value={form.type}
                        class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-200"
                    >
                        <option value="government">Government</option>
                        <option value="private">Private</option>
                        <option value="mixed">Mixed</option>
                    </select>
                    {#if form.errors.type}
                        <p class="mt-1 text-sm text-rose-600">
                            {form.errors.type}
                        </p>
                    {/if}
                </div>

                <div class="sm:col-span-2">
                    <label
                        class="mb-2 block text-sm font-medium text-slate-700"
                        for="base_url">Base URL</label
                    >
                    <input
                        id="base_url"
                        bind:value={form.base_url}
                        class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-200"
                        placeholder="https://example.gov/jobs"
                        type="url"
                    />
                    {#if form.errors.base_url}
                        <p class="mt-1 text-sm text-rose-600">
                            {form.errors.base_url}
                        </p>
                    {/if}
                </div>

                <div>
                    <label
                        class="mb-2 block text-sm font-medium text-slate-700"
                        for="crawl_interval"
                    >
                        Crawl Interval (minutes)
                    </label>
                    <input
                        id="crawl_interval"
                        bind:value={form.crawl_interval}
                        class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-200"
                        min="1"
                        step="1"
                        type="number"
                    />
                    {#if form.errors.crawl_interval}
                        <p class="mt-1 text-sm text-rose-600">
                            {form.errors.crawl_interval}
                        </p>
                    {/if}
                </div>

                <div class="flex items-end">
                    <label
                        class="inline-flex cursor-pointer items-center gap-3 rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-700 transition hover:bg-slate-50"
                    >
                        <input
                            bind:checked={form.is_active}
                            class="h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500"
                            type="checkbox"
                        />
                        <span>Active source</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end border-t border-slate-200 pt-4">
                <button
                    class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60"
                    disabled={form.processing}
                    type="submit"
                >
                    {form.processing ? 'Saving...' : 'Save Source'}
                </button>
            </div>
        </form>
    </div>
</div>
