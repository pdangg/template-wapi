<div class="flex" x-data="{
    tempMessage: '',
    message: @entangle('message').defer,
    error: '',
    showButton: @entangle('showButton').defer,
    buttonText: @entangle('buttonText').defer,
    buttonUrl: @entangle('buttonUrl').defer,
    template: '{{ request('template') }}', // Menyimpan template yang dipilih dari URL
    imageUrl: '{{ asset('assets/default.jpg') }}',
    isTemplateLocked: {{ request('template') ? 'true' : 'false' }}, // Menyimpan status kunci template
    updatePreview() {
        let inputFile = document.getElementById('image');
        this.imageUrl = inputFile.files.length ? URL.createObjectURL(inputFile.files[0]) : '{{ asset('assets/default.jpg') }}';
        this.message = this.tempMessage;

        // Ensure showButton is updated correctly
        this.showButton = this.convertToBoolean(this.showButton);
    },
    async updateMessageBasedOnTemplate() {
        if (this.template) {
            fetch(`/api/templates/${this.template}`)
                .then(response => response.json())
                .then(data => {
                    this.tempMessage = data.message || '';
                    this.showButton = true;
                    this.buttonText = data.buttonText || '';
                    this.updatePreview();
                })
                .catch(error => {
                    console.error('Error fetching template:', error);
                    this.tempMessage = '';
                    this.showButton = false;
                    this.buttonText = '';
                });
        } else {
            this.tempMessage = '';
            this.showButton = false;
            this.buttonText = '';
        }
        this.message = this.tempMessage;
    },
    getPreviewMessage() {
        return this.message ? this.message.replace(/\{\{\s*nama\s*\}\}/g, 'Jennie').replace(/\n/g, '<br>') : '';
    },
    insertTag(tag) {
        let textarea = this.$refs.messageTextarea;
        let cursorPosStart = textarea.selectionStart;
        let cursorPosEnd = textarea.selectionEnd;
        let textBefore = textarea.value.substring(0, cursorPosStart);
        let selectedText = textarea.value.substring(cursorPosStart, cursorPosEnd);
        let textAfter = textarea.value.substring(cursorPosEnd);

        // Wrap the selected text with the tag
        if (Array.isArray(tag)) {
            this.tempMessage = textBefore + tag[0] + selectedText + tag[1] + textAfter;
            this.$nextTick(() => {
                textarea.setSelectionRange(cursorPosStart + tag[0].length, cursorPosEnd + tag[0].length);
            });
        } else {
            this.tempMessage = textBefore + tag + textAfter;
            this.$nextTick(() => {
                textarea.setSelectionRange(cursorPosStart + tag.length, cursorPosEnd + tag.length);
            });
        }

        textarea.focus();
    },
    convertToBoolean(value) {
        return value === 'true' || value === true;
    }
}" @insert-tag.window="insertTag($event.detail.tag)" x-init="updateMessageBasedOnTemplate()">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Broadcast</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <style>
            .active {
                background-color: #065f46;
                /* bg-green-700 */
            }
        </style>
    </head>

    <body class="flex bg-gray-100">
        <!-- Sidebar -->
        <div class="flex">
            <aside class="w-64 bg-green-900 text-white p-4">
                <div class="text-2xl font-bold mb-8">ADMIN MENU</div>
                <nav class="flex flex-col space-y-4">
                    <a href="{{ route('bc') }}" class="py-2.5 px-6 bg-green-900 hover:bg-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('bc') }}" class="py-2.5 px-6 bg-green-900 hover:bg-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        Broadcast
                    </a>
                    <a href="{{ route('bc') }}" class="py-2.5 px-6 bg-green-900 hover:bg-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        Contact
                    </a>
                    <a href="{{ route('msg') }}" class="py-2.5 px-6 bg-green-900 hover:bg-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                        Template Message
                    </a>
                    <a href="{{ route('bc') }}" class="py-2.5 px-6 bg-green-900 hover:bg-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                        </svg>
                        Draft
                    </a>
                    <a href="{{ route('bc') }}" class="py-2.5 px-6 bg-green-900 hover:bg-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        Package
                    </a>
                    <a href="{{ route('bc') }}"
                        class="py-2.5 px-6 bg-green-900 hover:bg-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                        </svg>
                        Notification
                    </a>
                    <hr class="border-t border-gray-300 my-2">
                    <a href="{{ route('bc') }}"
                        class="py-2.5 px-6 bg-green-900 hover:bg-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Settings
                    </a>
                    <a href="{{ route('bc') }}"
                        class="py-2.5 px-6 bg-green-900 hover:bg-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                        Log out
                    </a>
                </nav>
            </aside>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 p-6">
            <!-- Header -->
            <header class="flex items-center justify-between bg-white p-6 rounded shadow">
                <h1 class="text-2xl font-bold">Broadcast</h1>
                <div class="flex items-center">
                    <div class="mr-6">
                        <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full">1000 credit</span>
                    </div>
                    <div class="relative">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0018 14.158V11a6.002 6.002 0 00-5-5.917V5a2 2 0 10-4 0v.083A6.002 6.002 0 004 11v3.159c0 .538-.214 1.055-.595 1.436L2 17h5m8 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        <span class="absolute top-0 right-0 bg-red-600 text-white rounded-full px-1 text-xs">2</span>
                    </div>
                    <div class="ml-6">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Profile" class="w-10 h-10 rounded-full">
                        <span class="ml-2">Mr. Paijo</span>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
        <div class="flex flex-col flex-1 p-6">
            <!-- Header -->
            <header class="flex items-center justify-between bg-white p-6 rounded shadow">
                <h1 class="text-2xl font-bold">Broadcast</h1>
                <div class="flex items-center">
                    <div class="mr-6">
                        <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full">1000 credit</span>
                    </div>
                    <div class="relative">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0018 14.158V11a6.002 6.002 0 00-5-5.917V5a2 2 0 10-4 0v.083A6.002 6.002 0 004 11v3.159c0 .538-.214 1.055-.595 1.436L2 17h5m8 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        <span class="absolute top-0 right-0 bg-red-600 text-white rounded-full px-1 text-xs">2</span>
                    </div>
                    <div class="ml-6">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Profile" class="w-10 h-10 rounded-full">
                        <span class="ml-2">Mr. Paijo</span>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <div class="flex flex-col mt-8">
                <!-- Broadcast Menu Section -->
                <div class="bg-white p-6 rounded shadow-lg w-full max-w-7xl mx-auto">
                    <h2 class="text-2xl font-bold mb-6 text-center">Broadcast Menu</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Form Section -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-4">Formulir Broadcast</h3>
                            <form>
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2">Nama Broadcast</label>
                                    <input type="text"
                                        class="border border-gray-300 shadow-md rounded py-2 px-3 mb-4 w-full text-gray-700 leading-tight focus:shadow-outline"
                                        placeholder="Masukkan Nama Broadcast">
                                </div>

                                <div>
                                    <label class="block text-gray-700 font-bold mb-2">Template</label>
                                    <select
                                        class="border border-gray-300 shadow-md rounded py-2 px-3 mb-4 w-full text-gray-700 leading-tight focus:shadow-outline"
                                        x-model="template" @change="updateMessageBasedOnTemplate"
                                        :disabled="isTemplateLocked">
                                        <option value="" disabled selected>---Pilih Template---</option>
                                        @foreach ($templates as $template)
                                            <option value="{{ $template->id }}"
                                                {{ $selectedTemplate == $template->id ? 'selected' : '' }}>
                                                {{ $template->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="image" class="block text-gray-700 font-bold mb-2">Gambar:</label>
                                    <input type="file" id="image" wire:model="image"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <div x-show="error" class="text-red-500 mt-2" x-text="error"></div>
                                    @if ($customError)
                                        <span class="text-red-500">{{ $customError }}</span>
                                    @else
                                        @error('image')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    @endif
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="block text-gray-700 font-bold mb-2">Isi
                                        Pesan:</label>
                                    <button type="button" @click="insertTag('\{\{ nama \}\}')"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">Jennie</button>
                                    <button type="button" @click="insertTag(['<b>', '</b>'])"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">Bold</button>
                                    <textarea id="message" x-ref="messageTextarea" x-model="tempMessage" rows="6"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 mt-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="interaction" class="block text-gray-700 font-bold mb-2">Tombol
                                        Interaksi:</label>
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="ada" name="showButton" value="true"
                                                x-model="showButton" class="mr-2 leading-tight">
                                            <label for="ada" class="text-gray-700">Ada</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="tidak" name="showButton" value="false"
                                                x-model="showButton" class="mr-2 leading-tight">
                                            <label for="tidak" class="text-gray-700">Tidak</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4" x-show="convertToBoolean(showButton)">
                                    <label for="buttonUrl" class="block text-gray-700 font-bold mb-2">Alamat
                                        URL:</label>
                                    <input type="text" id="buttonUrl" x-model="buttonUrl"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div class="mb-4" x-show="convertToBoolean(showButton)">
                                    <label for="buttonText" class="block text-gray-700 font-bold mb-2">Isi
                                        Tombol:</label>
                                    <input type="text" id="buttonText" x-model="buttonText"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div class="max-w-lg mx-auto rounded-lg p-4">
                                    <a href="{{ route('bc') }}">
                                        <button class="bg-green-500 hover:bg-green-700 text-white mt-8 font-bold text-lg py-3 px-6 rounded-xl block w-full">
                                            Kirim Broadcast
                                        </button>
                                    </a>
                                </div>
                            </form>
                        </div>

                        <!-- Preview Section -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-4">Pratinjau Broadcast</h3>
                            <div class="w-50 p-4">
                                <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden mb-4">
                                    <div class="bg-cover h-96" :style="`background-image: url(${imageUrl})`"></div>
                                    <div class="p-4">
                                        <h1 class="text-gray-900 font-bold text-2xl break-words whitespace-normal"
                                            x-html="getPreviewMessage()"></h1>
                                        <p class="mt-2 text-gray-600">Your Preview</p>
                                    </div>
                                </div>
                                <div x-show="showButton" class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-4">
                                    <a :href="buttonUrl" target="_blank"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded w-full text-center block"
                                        x-text="buttonText || 'CEK SEKARANG'"></a>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-center space-x-4 mt-2">
                                <button @click="updatePreview()"
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded">Preview</button>
                                <a href="{{ route('bc') }}">
                                    <button
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Simpan
                                        Draft</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
</div>
</div>

<script>
    // JavaScript to add 'active' class to the current link
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('aside a');
        const currentPath = window.location.pathname.split('/').pop();
        links.forEach(link => {
            const linkPath = link.getAttribute('href').split('/').pop();
            if (linkPath === currentPath) {
                link.classList.add('active');
            }
        });
    });
</script>
</body>
</div>
