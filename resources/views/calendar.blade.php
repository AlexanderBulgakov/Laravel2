<x-guest-layout>
    <x-slot:title>
        {{ __('Calendar') }}
    </x-slot>

	<style>
		[x-cloak] {
			display: none;
		}
	</style>

    <div x-data="{
            date: '',
            month: '',
            year: '',
            events: 0,

            beforeEmptyDays: [],
            monthDays: [],
            afterEmptyDays: [],

            modalIsOpen: false,
            modalTitle: '',
            modalDate: '',
            modalDescription: '',

            days: [
                'Sun', 
                'Mon', 
                'Tue', 
                'Wed', 
                'Thu', 
                'Fri', 
                'Sat'
            ],
            months: [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ],
            
            initCalendar(url){
                fetch(url)
                .then(response => response.json())
                .then(response => {
                    console.log(response);
                    this.events = response.data;
                });

                let date = new Date();

                this.date = date;
                this.month = date.getMonth();
                this.year = date.getFullYear();

                this.setDataForCalendar();
            },

            get currenMonth() {
                return this.months[this.month];
            },

            get currenYear() {
                return this.year;
            },

            prevButton(){
                this.month--;

                this.checkMmonth();
            },

            nextButton(){
                this.month++;

                this.checkMmonth();
            },

            checkMmonth(){
                if (this.month < 0 || this.month > 11) {
                    let date = new Date(this.year, this.month, new Date().getDate());

                    this.date = date;
                    this.month = date.getMonth();
                    this.year = date.getFullYear();
                } else {
                    this.date = new Date();
                }

                this.setDataForCalendar();
            },

            setDataForCalendar(){
                let dayOfFirstWeek = new Date(this.year, this.month, 1).getDay();
                let lastDateOfCurrentMonth = new Date(this.year, this.month + 1, 0).getDate();
                let dayOfLastWeek = new Date(this.year, this.month, lastDateOfCurrentMonth).getDay();
                let lastDateOfPreviousMonth = new Date(this.year, this.month, 0).getDate();
               
                this.beforeEmptyDays = [];
                this.monthDays = [];
                this.afterEmptyDays = [];

                for (let i = dayOfFirstWeek; i > 0; i--) {
                    let numDate = lastDateOfPreviousMonth - i + 1;
                    this.beforeEmptyDays.push(numDate);
                }

                for (let i = 1; i <= lastDateOfCurrentMonth; i++) {
                    this.monthDays.push(i);
                }

                for (let i = dayOfLastWeek; i < 6; i++) {
                    this.afterEmptyDays.push(i - dayOfLastWeek + 1);
                }
            },

            isToday(day){
                return day === this.date.getDate()
                && this.month === this.date.getMonth()
                && this.year === this.date.getFullYear()
            },

            showEvent(selectedEvent){
                this.modalIsOpen = true;
                this.modalTitle = selectedEvent.event_title;
                this.modalDate = selectedEvent.event_date;
                this.modalDescription = selectedEvent.event_description;
            }
        }" x-init="initCalendar(`{{ route("api.events") }}`)" x-cloak>
        <div>
            <div class="flex items-center justify-between py-2 px-6">
                <div>
                    <span x-text="currenMonth" class="text-lg font-bold text-gray-800"></span>
                    <span x-text="currenYear" class="ml-1 text-lg text-gray-600 font-normal"></span>
                </div>
                <div>
                    <button 
                        type="button"
                        class="inline-flex items-center cursor-pointer" 
                        @click="prevButton">
                        <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>  
                    </button>
                    <button 
                        type="button"
                        class="inline-flex items-center cursor-pointer" 
                        @click="nextButton">
                        <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>									  
                    </button>
                </div>
            </div>	
            
            <div>
                <div class="flex flex-wrap">
                    <template x-for="(day, i) in days" :key="i">	
                        <div style="width: 14.26%" class="px-2 py-2">
                            <div
                                x-text="day" 
                                class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
                        </div>
                    </template>
                </div>
                <template x-if="events">
                    <div class="flex flex-wrap border-t border-l">
                        <template x-for="(day, i2) in beforeEmptyDays" :key="i2">
                            <div style="width: 14.28%; height: 120px" class="p-2 border-r border-b relative bg-gray-100"></div>
                        </template>	
                        <template x-for="(day, i3) in monthDays" :key="i3">	
                            <div style="width: 14.28%; height: 120px" class="p-2 border-r border-b relative">
                                <div
                                    x-text="day"
                                    class="inline-flex w-6 h-6 items-center justify-center text-center leading-none rounded-full"
                                    :class="{'bg-blue-800 text-white': isToday(day) == true, 'text-gray-700': isToday(day) == false }"	
                                ></div>
                                <div style="height: 80px;" class="overflow-y-auto mt-1">
                                    <template x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, day).toDateString() )">	
                                        <div class="px-2 py-1 rounded-lg mt-1 overflow-hidden border border-grey-200 bg-gray-100">
                                            <p @click="showEvent(event)" x-text="event.event_title" class="text-sm truncate cursor-pointer leading-tight"></p>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                        <template x-for="(day, i4) in afterEmptyDays" :key="i4">
                            <div style="width: 14.28%; height: 120px" class="p-2 border-r border-b relative bg-gray-100"></div>
                        </template>	
                    </div>
                </template>
            </div>
        </div>

        <div style="background-color: rgba(0, 0, 0, 0.8)" class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="modalIsOpen">
            <div class="p-4 max-w-xl mx-auto absolute left-0 right-0 overflow-hidden mt-24">
                <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
                    x-on:click="modalIsOpen = !modalIsOpen">
                    <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                    </svg>
                </div>

                <div class="shadow rounded-lg bg-white overflow-hidden w-full block p-8">
                    <h2 x-text="modalTitle" class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2"></h2>
                    <strong x-text="modalDate" class="text-gray-800 block mb-1 text-sm tracking-wide"></strong>
                    <p x-text="modalDescription"></p>  
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>