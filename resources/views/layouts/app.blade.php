<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InsuranceWise</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50">

  <!-- Navbar -->
  <nav class="flex justify-between items-center p-6 bg-white shadow-md">
    <div class="text-2xl font-semibold text-gray-800">InsuranceWise</div>
    <ul class="flex gap-6 text-gray-600">
      <li><a href="#" class="hover:text-gray-900">Get Recommendation</a></li>
      <li><a href="#" class="hover:text-gray-900">Browse Plan</a></li>
      <li><a href="#" class="hover:text-gray-900">Get Quote</a></li>
      <li><a href="#" class="hover:text-gray-900">Logout</a></li>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-r from-pink-100 to-pink-200 text-center py-32">
    <h1 class="text-5xl font-bold text-gray-800 mb-4">Welcome to InsuranceWise</h1>
    <p class="text-gray-600 uppercase tracking-wide mb-8">Your personalized insurance insight dashboard</p>
    <a href="#dashboard" class="px-6 py-3 border border-pink-400 text-pink-500 font-semibold rounded hover:bg-pink-100 transition">Get Personalized Recommendations</a>
  </section>

  <!-- Dashboard Section -->
  <section id="dashboard" class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-12">What product or service are you looking for?</h2>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Card -->
        <div class="bg-white p-8 rounded shadow text-center">
          <h3 class="text-lg font-semibold text-gray-500 mb-4">Medical Insurance</h3>
          <p class="text-3xl font-bold text-gray-800">3</p>
        </div>
        <div class="bg-white p-8 rounded shadow text-center">
          <h3 class="text-lg font-semibold text-gray-500 mb-4">Critical Illness Insurance</h3>
          <p class="text-3xl font-bold text-gray-800">3</p>
        </div>
        <div class="bg-white p-8 rounded shadow text-center">
          <h3 class="text-lg font-semibold text-gray-500 mb-4">Life Insurance</h3>
          <p class="text-3xl font-bold text-gray-800">3</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-24 bg-gradient-to-r from-pink-100 to-pink-200 text-center">
    <h2 class="text-3xl font-bold mb-4">Do you still feel confused?</h2>
    <p class="text-gray-600 mb-8">Get a quote now. We are ready to help you.</p>
    <a href="#" class="px-6 py-3 bg-pink-500 text-white font-semibold rounded hover:bg-pink-600 transition">Get Quote</a>
  </section>

</body>
</html>
