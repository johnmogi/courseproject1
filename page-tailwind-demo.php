<?php
/**
 * Template Name: Tailwind Demo
 * Description: A comprehensive demo page template showcasing various Tailwind CSS components and utilities.
 */

// Enqueue Tailwind CSS (already handled in functions.php, but ensuring it's loaded)
wp_enqueue_script('tailwind-css');

// Get header
get_header();
?>

<div class="container mx-auto px-4 py-8 max-w-6xl">
    <h1 class="text-5xl font-bold text-center mb-8 text-indigo-600">Comprehensive Tailwind CSS Demo</h1>
    <p class="text-lg text-center mb-12 text-gray-600">Showcasing buttons, forms, layouts, typography, spacing, and interactive components.</p>

    <!-- Typography Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b-2 border-gray-200 pb-2">Typography</h2>
        <div class="space-y-4">
            <h1 class="text-4xl font-bold">Heading 1</h1>
            <h2 class="text-3xl font-semibold">Heading 2</h2>
            <h3 class="text-2xl font-medium">Heading 3</h3>
            <h4 class="text-xl font-normal">Heading 4</h4>
            <p class="text-base text-gray-700">This is a paragraph with normal text. <strong class="font-bold">Bold text</strong>, <em class="italic">italic text</em>, and <u class="underline">underlined text</u>.</p>
            <p class="text-sm text-gray-500">Small text for captions or secondary info.</p>
            <p class="text-lg text-gray-800">Large text for emphasis.</p>
        </div>
    </section>

    <!-- Buttons Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b-2 border-gray-200 pb-2">Buttons</h2>
        <div class="flex flex-wrap gap-4 mb-6">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Primary</button>
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Secondary</button>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Success</button>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Danger</button>
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Warning</button>
            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Info</button>
        </div>
        <div class="flex flex-wrap gap-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">Small</button>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded">Large</button>
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 hover:text-white border border-blue-500 py-2 px-4 rounded">Outline</button>
            <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed">Disabled</button>
        </div>
    </section>

    <!-- Forms Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b-2 border-gray-200 pb-2">Forms</h2>
        <form class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Full Name</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Enter your full name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email Address</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="your@email.com">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Country</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>United Kingdom</option>
                    <option>Australia</option>
                </select>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Message</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32" id="message" placeholder="Your message here..."></textarea>
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600">
                    <span class="ml-2 text-gray-700">Subscribe to newsletter</span>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" type="submit">Submit</button>
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" type="button">Cancel</button>
            </div>
        </form>
    </section>

    <!-- Layout and Grid Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b-2 border-gray-200 pb-2">Layout & Grid</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2 text-blue-800">Card 1</h3>
                <p class="text-gray-700">This card uses Tailwind's grid system for responsive layouts.</p>
                <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Action</button>
            </div>
            <div class="bg-green-100 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2 text-green-800">Card 2</h3>
                <p class="text-gray-700">Responsive design ensures cards stack on mobile devices.</p>
                <button class="mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Action</button>
            </div>
            <div class="bg-purple-100 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2 text-purple-800">Card 3</h3>
                <p class="text-gray-700">Perfect for showcasing content in a grid format.</p>
                <button class="mt-4 bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Action</button>
            </div>
        </div>
        <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <div class="flex-1 bg-gray-100 p-4 rounded">Flex Item 1</div>
            <div class="flex-1 bg-gray-200 p-4 rounded">Flex Item 2</div>
            <div class="flex-1 bg-gray-300 p-4 rounded">Flex Item 3</div>
        </div>
    </section>

    <!-- Spacing and Colors Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b-2 border-gray-200 pb-2">Spacing & Colors</h2>
        <div class="space-y-4">
            <div class="p-4 bg-blue-50 border-l-4 border-blue-400">
                <p class="text-blue-700">This demonstrates padding (p-4) and background colors with borders.</p>
            </div>
            <div class="m-4 p-4 bg-green-50 border border-green-200 rounded">
                <p class="text-green-700">Margins (m-4), padding, borders, and border-radius in action.</p>
            </div>
            <div class="flex gap-2">
                <div class="w-8 h-8 bg-red-500 rounded"></div>
                <div class="w-8 h-8 bg-yellow-500 rounded"></div>
                <div class="w-8 h-8 bg-pink-500 rounded"></div>
                <div class="w-8 h-8 bg-indigo-500 rounded"></div>
                <div class="w-8 h-8 bg-purple-500 rounded"></div>
                <div class="w-8 h-8 bg-gray-500 rounded"></div>
            </div>
        </div>
    </section>

    <!-- Accordion Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b-2 border-gray-200 pb-2">Accordion</h2>
        <div class="accordion">
            <div class="accordion-item">
                <button class="accordion-header w-full text-left p-4 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:bg-gray-300" onclick="toggleAccordion('accordion1')">
                    <span class="text-lg font-medium">What is Tailwind CSS?</span>
                </button>
                <div id="accordion1" class="accordion-content hidden p-4 bg-gray-100">
                    <p>Tailwind CSS is a utility-first CSS framework that provides low-level utility classes to build custom designs directly in your markup.</p>
                    <ul class="list-disc list-inside mt-2">
                        <li>Utility-first approach</li>
                        <li>Highly customizable</li>
                        <li>Responsive design utilities</li>
                        <li>Dark mode support</li>
                    </ul>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header w-full text-left p-4 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:bg-gray-300" onclick="toggleAccordion('accordion2')">
                    <span class="text-lg font-medium">Why use Tailwind?</span>
                </button>
                <div id="accordion2" class="accordion-content hidden p-4 bg-gray-100">
                    <p>Tailwind allows for rapid development, consistent design, and easy maintenance without writing custom CSS.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b-2 border-gray-200 pb-2">Tabs</h2>
        <div class="tabs">
            <div class="tab-buttons flex border-b">
                <button class="tab-button py-2 px-4 border-b-2 border-blue-500 text-blue-500 font-semibold" onclick="openTab('tab1')">Features</button>
                <button class="tab-button py-2 px-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700" onclick="openTab('tab2')">Usage</button>
                <button class="tab-button py-2 px-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700" onclick="openTab('tab3')">Examples</button>
            </div>
            <div id="tab1" class="tab-content p-4 bg-white border border-t-0">
                <h3 class="text-xl font-medium mb-2">Key Features</h3>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Utility-first CSS framework</li>
                    <li>Responsive utilities</li>
                    <li>Customizable design system</li>
                    <li>Dark mode support</li>
                </ul>
            </div>
            <div id="tab2" class="tab-content hidden p-4 bg-white border border-t-0">
                <h3 class="text-xl font-medium mb-2">How to Use</h3>
                <p class="text-gray-700">Apply utility classes directly in your HTML. For example: <code class="bg-gray-100 px-2 py-1 rounded">&lt;div class="bg-blue-500 text-white p-4"&gt;</code></p>
            </div>
            <div id="tab3" class="tab-content hidden p-4 bg-white border border-t-0">
                <h3 class="text-xl font-medium mb-2">Code Examples</h3>
                <pre class="bg-gray-100 p-4 rounded overflow-x-auto"><code>&lt;button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"&gt;
  Button
&lt;/button&gt;</code></pre>
            </div>
        </div>
    </section>

    <!-- Interactive Elements -->
    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b-2 border-gray-200 pb-2">Interactive Elements</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Modal Trigger</h3>
                <button id="openModal" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Open Modal</button>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Tooltip</h3>
                <div class="relative inline-block">
                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onmouseover="showTooltip()" onmouseout="hideTooltip()">Hover for Tooltip</button>
                    <div id="tooltip" class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 transition-opacity duration-300 pointer-events-none">This is a tooltip!</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-md mx-auto">
            <h2 class="text-2xl font-bold mb-4">Modal Title</h2>
            <p class="mb-6">This is a modal dialog created with Tailwind CSS.</p>
            <button id="closeModal" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Close Modal</button>
        </div>
    </div>
</div>

<script>
// Accordion functionality
function toggleAccordion(id) {
    const content = document.getElementById(id);
    content.classList.toggle('hidden');
}

// Tabs functionality
function openTab(tabName) {
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => content.classList.add('hidden'));

    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(button => {
        button.classList.remove('border-blue-500', 'text-blue-500');
        button.classList.add('border-transparent', 'text-gray-500');
    });

    document.getElementById(tabName).classList.remove('hidden');
    event.target.classList.remove('border-transparent', 'text-gray-500');
    event.target.classList.add('border-blue-500', 'text-blue-500');
}

// Modal functionality
document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('modal').classList.remove('hidden');
});

document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('modal').classList.add('hidden');
});

// Tooltip functionality
function showTooltip() {
    document.getElementById('tooltip').classList.remove('opacity-0');
    document.getElementById('tooltip').classList.add('opacity-100');
}

function hideTooltip() {
    document.getElementById('tooltip').classList.remove('opacity-100');
    document.getElementById('tooltip').classList.add('opacity-0');
}
</script>

<?php
// Get footer
get_footer();
?>
