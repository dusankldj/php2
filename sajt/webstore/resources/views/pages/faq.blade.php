@extends('layouts.app')

@section('content')
    <section class="w-[80%] flex-1 p-6 mx-auto">
            <h1 class="text-2xl font-bold mb-4 text-center"><span class="text-blue-700">F</span>requently <span class="text-blue-700">A</span>sked <span class="text-blue-700">Q</span>uestions</h1>
            <p>Webstore is here for you. This is page where you can find answers on most common asked questions.</p>
            <p>If you can not find answer for your question, please <a class="italic font-bold text-blue-700 underline underline-offset-2" href="{{ url('/contact') }}">contact us.</a></p>
    </section>

    <section class="w-[80%] mx-auto my-16">

        <div class="space-y-4">

            <!-- FAQ 1 -->
            <div class="border rounded-lg shadow-sm faq-item">

                <button class="faq-question w-full flex justify-between items-center p-4 text-left font-semibold hover:bg-gray-50">
                    What payment methods do you accept?
                    <span class="faq-icon text-xl">+</span>
                </button>

                <div class="faq-answer hidden px-4 pb-4 text-gray-600">
                    We accept all major credit cards, PayPal and bank transfers.
                    Your payment information is always processed securely.
                </div>

            </div>


            <!-- FAQ 2 -->
            <div class="border rounded-lg shadow-sm faq-item">

                <button class="faq-question w-full flex justify-between items-center p-4 text-left font-semibold hover:bg-gray-50">
                    How long does shipping take?
                    <span class="faq-icon text-xl">+</span>
                </button>

                <div class="faq-answer hidden px-4 pb-4 text-gray-600">
                    Standard shipping usually takes 3-7 business days depending
                    on your location. Express delivery is also available.
                </div>

            </div>


            <!-- FAQ 3 -->
            <div class="border rounded-lg shadow-sm faq-item">

                <button class="faq-question w-full flex justify-between items-center p-4 text-left font-semibold hover:bg-gray-50">
                    Can I return a product?
                    <span class="faq-icon text-xl">+</span>
                </button>

                <div class="faq-answer hidden px-4 pb-4 text-gray-600">
                    Yes, you can return products within 30 days after purchase
                    as long as they are unused and in original packaging.
                </div>

            </div>

        </div>

    </section>
@endsection



