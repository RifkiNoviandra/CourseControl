@extends('layouts.app')
@section('title', 'Help')
@section('content')
	<main>
		<section>
			<div class="container" data-sticky-container="">
				<div class="row g-4">
					<!-- Left side START -->
					@include('layouts.help.leftside')
					<!-- Left side END -->

					<!-- Right side START -->
					<div class="col-md-9">
						<div id="nav-scroll" data-bs-spy="scroll" data-bs-target="#nav-scroll" data-bs-smooth-scroll="true" tabindex="0">

							<!-- Guide content START -->
							<div id="item-1">
								<div class="card bg-transparent">
									<!-- Article title -->
									<div class="card-header bg-transparent border-bottom py-0 px-0">
										<h2>Get started with node.js</h2>
										<!-- Update and author -->
										<ul class="nav nav-divider mb-3">
											<li class="nav-item">Last updated: 2 months ago</li>
											<li class="nav-item">by Barnabas</li>
										</ul>
									</div>
									<!-- Article Info -->
									<div class="card-body px-0 pb-0">
										<p>Node.js is a popular JavaScript runtime built on Chrome's V8 JavaScript engine, enabling developers to build fast and scalable server-side applications. 
											It allows you to execute JavaScript on the server, making it a versatile tool for backend development. With its non-blocking, event-driven architecture, 
											Node.js excels in handling numerous simultaneous connections with high throughput, which makes it ideal for real-time applications like chat apps and online gaming platforms.
											<b>Learning Node.js opens doors to building dynamic, server-side applications. </p>
										<!-- Button -->
										<a href="https://nodejs.org/en/download/" class="btn btn-warning">Download Node JS</a>
										<h5 class="mt-4">Table of Contents</h5>
										<p>Mind Mingle adalah platform edukasi yang menyediakan akses ke berbagai materi belajar gratis, seperti video, e-book, dan kuis. Pengguna harus menyelesaikan kuis sebelum melanjutkan ke materi berikutnya.</p>
										<div class="alert alert-warning" role="alert">
											<strong>Note: </strong>Pastikan Anda menyelesaikan kuis agar dapat melanjutkan ke materi berikutnya. Pengguna juga dapat mengakses berbagai topik pembelajaran yang disesuaikan dengan minat dan kebutuhan. <a class="alert-link" href="#!">Lihat lebih lanjut</a>
										</div>
										<p>Platform ini memungkinkan para ahli atau relawan mendaftar sebagai mentor di bidang tertentu, seperti desain dan coding. Mentor direkrut berdasarkan kualifikasi tertentu dan dapat memperoleh bayaran dari performa mereka serta pengguna yang menggunakan fitur premium, seperti chat privat atau akses ke materi eksklusif.</p>
										<!-- Article list -->
										<ul>
											<li>Mind Mingle memberikan akses gratis ke berbagai materi pembelajaran yang mencakup video, e-book, dan kuis untuk membantu pengguna meningkatkan keterampilan mereka.</li>
											<li>Setiap pengguna harus menyelesaikan kuis sebelum melanjutkan ke materi berikutnya, memastikan pemahaman yang lebih mendalam tentang setiap topik.</li>
											<li>Platform ini memungkinkan para ahli atau relawan untuk menjadi mentor dalam berbagai bidang, seperti desain, coding, dan lainnya.</li>
											<li>Pengguna dapat berdiskusi langsung dengan mentor melalui forum tanpa biaya tambahan jika mentor tersedia.</li>
											<li>Fitur premium di Mind Mingle memberikan akses ke chat privat dengan mentor atau materi eksklusif yang dapat meningkatkan pengalaman belajar.</li>
											<li><i>Para mentor di Mind Mingle dapat memperoleh bayaran berdasarkan performa mereka dan penggunaan fitur premium oleh pengguna.</i></li>
										</ul>
										<p class="mb-0">Mind Mingle berkomitmen untuk memberikan pengalaman belajar yang menyeluruh dengan pendekatan berbasis hasil. Platform ini memudahkan pengguna untuk mengakses berbagai materi belajar, 
											serta berinteraksi dengan mentor yang berkompeten untuk mendalami berbagai topik. <u>Jangan lewatkan kesempatan untuk memanfaatkan fitur premium yang membantu dalam proses pembelajaran lebih mendalam.</u></p>

									</div>
								</div>
							</div>
							<!-- Guide content END -->
							<!-- Divider -->
							<div class="text-center h5 my-5">. . .</div>

							<!-- Privacy and security content START -->
							<div id="item-2">
								<div class="card">
									<!-- Article title -->
									<div class="card-header border-bottom py-0 px-0">
										<h2>Privacy Policy for Mind Mingle</h2>
									</div>

									<!-- Article Info -->
									<div class="card-body px-0">
										<p>At Mind Mingle, accessible from https://mindmingle.co.id/, one of our main
											priorities is
											the privacy of our visitors. This Privacy Policy document contains types of
											information that is
											collected and recorded by Mind Mingle and how we use it.</p>
										<p>If you have additional questions or require more information about our Privacy
											Policy, do not
											hesitate to contact us.</p>
										<!-- Button -->
										<h5 class="mt-4">Log Files</h5>
										<p>Mind Mingle follows a standard procedure of using log files. These files log visitors
											when they visit
											websites. All hosting companies do this and a part of hosting services' analytics.
											The information
											collected by log files include internet protocol (IP) addresses, browser type,
											Internet Service
											Provider (ISP), date and time stamp, referring/exit pages, and possibly the number
											of clicks. These
											are not linked to any information that is personally identifiable. The purpose of
											the information is
											for analyzing trends, administering the site, tracking users' movement on the
											website, and gathering
											demographic information. Our Privacy Policy was created with the help of the <a
												href="https://www.privacypolicyonline.com/privacy-policy-generator/">Privacy
												Policy
												Generator</a>.</p>
										<h5 class="mt-4">Cookies and Web Beacons</h5>
										<p>Like any other website, Mind Mingle uses 'cookies'. These cookies are used to store
											information
											including visitors' preferences, and the pages on the website that the visitor
											accessed or visited.
											The information is used to optimize the users' experience by customizing our web
											page content based
											on visitors' browser type and/or other information.</p>

										<p>For more general information on cookies, please read <a
												href="https://www.privacypolicyonline.com/what-are-cookies/">the "Cookies"
												article from the
												Privacy Policy Generator</a>.</p>
										<h5 class="mt-4">Privacy Policies</h5>

										<P>You may consult this list to find the Privacy Policy for each of the advertising
											partners of
											Mind Mingle.</p>

										<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or
											Web Beacons that
											are used in their respective advertisements and links that appear on Mind Mingle,
											which are sent
											directly to users' browser. They automatically receive your IP address when this
											occurs. These
											technologies are used to measure the effectiveness of their advertising campaigns
											and/or to
											personalize the advertising content that you see on websites that you visit.</p>

										<p>Note that Mind Mingle has no access to or control over these cookies that are used by
											third-party
											advertisers.</p>

										<h5 class="mt-4">Third Party Privacy Policies</h5>

										<p>Mind Mingle's Privacy Policy does not apply to other advertisers or websites. Thus,
											we are advising
											you to consult the respective Privacy Policies of these third-party ad servers for
											more detailed
											information. It may include their practices and instructions about how to opt-out of
											certain
											options. </p>

										<p>You can choose to disable cookies through your individual browser options. To know
											more detailed
											information about cookie management with specific web browsers, it can be found at
											the browsers'
											respective websites. What Are Cookies?</p>

										<h5 class="mt-4">Children's Information</h5>

										<p>Another part of our priority is adding protection for children while using the
											internet. We encourage
											parents and guardians to observe, participate in, and/or monitor and guide their
											online activity.
										</p>

										<p>Mind Mingle does not knowingly collect any Personal Identifiable Information from
											children under the
											age of 13. If you think that your child provided this kind of information on our
											website, we
											strongly encourage you to contact us immediately and we will do our best efforts to
											promptly remove
											such information from our records.</p>

										<h5 class="mt-4">Online Privacy Policy Only</h5>

										<p>This Privacy Policy applies only to our online activities and is valid for visitors
											to our website
											with regards to the information that they shared and/or collect in Mind Mingle. This
											policy is not
											applicable to any information collected offline or via channels other than this
											website.</p>

										<h5 class="mt-4">Consent</h5>

										<p>By using our website, you hereby consent to our Privacy Policy and agree to its Terms
											and Conditions.
										</p>
									</div>
									<!-- Review helpful START -->
								</div>
							</div>
							<!-- Privacy and security content END -->

							<!-- Divider -->
							<div class="text-center h5 my-5">. . .</div>

							<!-- Terms and Conditions content START -->
							<div id="item-3">
								<div class="card">
									<!-- Article title -->
									<div class="card-header border-bottom py-0 px-0">
										<h2><strong>Terms and Conditions</strong></h2>
									</div>

									<!-- Article Info -->
									<div class="card-body px-0">

										<p>Welcome to Mind Mingle!</p>

										<p>These terms and conditions outline the rules and regulations for the use of
											Mind Mingle's Website,
											located at https://school.basic.co.id/.</p>

										<p>By accessing this website we assume you accept these terms and conditions. Do not
											continue to use
											Mind Mingle if you do not agree to take all of the terms and conditions stated on
											this page.</p>

										<p>The following terminology applies to these Terms and Conditions, Privacy Statement
											and Disclaimer
											Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log
											on this website
											and compliant to the Company’s terms and conditions. "The Company", "Ourselves",
											"We", "Our" and
											"Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client
											and ourselves.
											All terms refer to the offer, acceptance and consideration of payment necessary to
											undertake the
											process of our assistance to the Client in the most appropriate manner for the
											express purpose of
											meeting the Client’s needs in respect of provision of the Company’s stated services,
											in accordance
											with and subject to, prevailing law of Netherlands. Any use of the above terminology
											or other words
											in the singular, plural, capitalization and/or he/she or they, are taken as
											interchangeable and
											therefore as referring to same. Our Terms and Conditions were created with the help
											of the.</p>

										<h5 class="mt-4"><strong>Cookies</strong></h5>

										<p>We employ the use of cookies. By accessing Mind Mingle, you agreed to use cookies in
											agreement with
											the Mind Mingle's Privacy Policy.</p>

										<p>Most interactive websites use cookies to let us retrieve the user’s details for each
											visit. Cookies
											are used by our website to enable the functionality of certain areas to make it
											easier for people
											visiting our website. Some of our affiliate/advertising partners may also use
											cookies.</p>

										<h5 class="mt-4"><strong>License</strong></h5>

										<p>Unless otherwise stated, Mind Mingle and/or its licensors own the intellectual
											property rights for
											all material on Mind Mingle. All intellectual property rights are reserved. You may
											access this from
											Mind Mingle for your own personal use subjected to restrictions set in these terms
											and conditions.
										</p>

										<p>You must not:</p>
										<ul>
											<li>Republish material from Mind Mingle</li>
											<li>Sell, rent or sub-license material from Mind Mingle</li>
											<li>Reproduce, duplicate or copy material from Mind Mingle</li>
											<li>Redistribute content from Mind Mingle</li>
										</ul>

										<p>This Agreement shall begin on the date hereof.</p>

										<p>Parts of this website offer an opportunity for users to post and exchange opinions
											and information in
											certain areas of the website. Mind Mingle does not filter, edit, publish or review
											Comments prior to
											their presence on the website. Comments do not reflect the views and opinions of
											Mind Mingle,its
											agents and/or affiliates. Comments reflect the views and opinions of the person who
											post their views
											and opinions. To the extent permitted by applicable laws, Mind Mingle shall not be
											liable for the
											Comments or for any liability, damages or expenses caused and/or suffered as a
											result of any use of
											and/or posting of and/or appearance of the Comments on this website.</p>

										<p>Mind Mingle reserves the right to monitor all Comments and to remove any Comments
											which can be
											considered inappropriate, offensive or causes breach of these Terms and Conditions.
										</p>

										<p>You warrant and represent that:</p>

										<ul>
											<li>You are entitled to post the Comments on our website and have all necessary
												licenses and
												consents to do so;</li>
											<li>The Comments do not invade any intellectual property right, including without
												limitation
												copyright, patent or trademark of any third party;</li>
											<li>The Comments do not contain any defamatory, libelous, offensive, indecent or
												otherwise unlawful
												material which is an invasion of privacy</li>
											<li>The Comments will not be used to solicit or promote business or custom or
												present commercial
												activities or unlawful activity.</li>
										</ul>

										<p>You hereby grant Mind Mingle a non-exclusive license to use, reproduce, edit and
											authorize others to
											use, reproduce and edit any of your Comments in any and all forms, formats or media.
										</p>

										<h5 class="mt-4"><strong>Hyperlinking to our Content</strong></h5>

										<p>The following organizations may link to our Website without prior written approval:
										</p>

										<ul>
											<li>Government agencies;</li>
											<li>Search engines;</li>
											<li>News organizations;</li>
											<li>Online directory distributors may link to our Website in the same manner as they
												hyperlink to
												the Websites of other listed businesses; and</li>
											<li>System wide Accredited Businesses except soliciting non-profit organizations,
												charity shopping
												malls, and charity fundraising groups which may not hyperlink to our Web site.
											</li>
										</ul>

										<p>These organizations may link to our home page, to publications or to other Website
											information so
											long as the link: (a) is not in any way deceptive; (b) does not falsely imply
											sponsorship,
											endorsement or approval of the linking party and its products and/or services; and
											(c) fits within
											the context of the linking party’s site.</p>

										<p>We may consider and approve other link requests from the following types of
											organizations:</p>

										<ul>
											<li>commonly-known consumer and/or business information sources;</li>
											<li>dot.com community sites;</li>
											<li>associations or other groups representing charities;</li>
											<li>online directory distributors;</li>
											<li>internet portals;</li>
											<li>accounting, law and consulting firms; and</li>
											<li>educational institutions and trade associations.</li>
										</ul>

										<p>We will approve link requests from these organizations if we decide that: (a) the
											link would not make
											us look unfavorably to ourselves or to our accredited businesses; (b) the
											organization does not have
											any negative records with us; (c) the benefit to us from the visibility of the
											hyperlink compensates
											the absence of Mind Mingle; and (d) the link is in the context of general resource
											information.</p>

										<p>These organizations may link to our home page so long as the link: (a) is not in any
											way deceptive;
											(b) does not falsely imply sponsorship, endorsement or approval of the linking party
											and its
											products or services; and (c) fits within the context of the linking party’s site.
										</p>

										<p>If you are one of the organizations listed in paragraph 2 above and are interested in
											linking to our
											website, you must inform us by sending an e-mail to Mind Mingle. Please include your
											name, your
											organization name, contact information as well as the URL of your site, a list of
											any URLs from
											which you intend to link to our Website, and a list of the URLs on our site to which
											you would like
											to link. Wait 2-3 weeks for a response.</p>

										<p>Approved organizations may hyperlink to our Website as follows:</p>

										<ul>
											<li>By use of our corporate name; or</li>
											<li>By use of the uniform resource locator being linked to; or</li>
											<li>By use of any other description of our Website being linked to that makes sense
												within the
												context and format of content on the linking party’s site.</li>
										</ul>

										<p>No use of Mind Mingle's logo or other artwork will be allowed for linking absent a
											trademark license
											agreement.</p>

										<h5 class="mt-4"><strong>iFrames</strong></h5>

										<p>Without prior approval and written permission, you may not create frames around our
											Webpages that
											alter in any way the visual presentation or appearance of our Website.</p>

										<h5 class="mt-4"><strong>Content Liability</strong></h5>

										<p>We shall not be hold responsible for any content that appears on your Website. You
											agree to protect
											and defend us against all claims that is rising on your Website. No link(s) should
											appear on any
											Website that may be interpreted as libelous, obscene or criminal, or which
											infringes, otherwise
											violates, or advocates the infringement or other violation of, any third party
											rights.</p>

										<h5 class="mt-4"><strong>Reservation of Rights</strong></h5>

										<p>We reserve the right to request that you remove all links or any particular link to
											our Website. You
											approve to immediately remove all links to our Website upon request. We also reserve
											the right to
											amen these terms and conditions and it’s linking policy at any time. By continuously
											linking to our
											Website, you agree to be bound to and follow these linking terms and conditions.</p>

										<h5 class="mt-4"><strong>Removal of links from our website</strong></h5>

										<p>If you find any link on our Website that is offensive for any reason, you are free to
											contact and
											inform us any moment. We will consider requests to remove links but we are not
											obligated to or so or
											to respond to you directly.</p>

										<p>We do not ensure that the information on this website is correct, we do not warrant
											its completeness
											or accuracy; nor do we promise to ensure that the website remains available or that
											the material on
											the website is kept up to date.</p>

										<h5 class="mt-4"><strong>Disclaimer</strong></h5>

										<p>To the maximum extent permitted by applicable law, we exclude all representations,
											warranties and
											conditions relating to our website and the use of this website. Nothing in this
											disclaimer will:</p>

										<ul>
											<li>limit or exclude our or your liability for death or personal injury;</li>
											<li>limit or exclude our or your liability for fraud or fraudulent
												misrepresentation;</li>
											<li>limit any of our or your liabilities in any way that is not permitted under
												applicable law; or
											</li>
											<li>exclude any of our or your liabilities that may not be excluded under applicable
												law.</li>
										</ul>

										<p>The limitations and prohibitions of liability set in this Section and elsewhere in
											this disclaimer:
											(a) are subject to the preceding paragraph; and (b) govern all liabilities arising
											under the
											disclaimer, including liabilities arising in contract, in tort and for breach of
											statutory duty.</p>

										<p>As long as the website and the information and services on the website are provided
											free of charge,
											we will not be liable for any loss or damage of any nature.</p>
									</div>
									<!-- Review helpful START -->
									<div class="card-footer border-0 py-0 px-0">
										<div class="border p-3 rounded d-sm-flex align-items-center justify-content-between text-center">
											<!-- Title -->
											<h5 class="m-0">Was this article helpful?</h5>
											<small class="py-2 d-block">20 out of 45 found this helpful</small>
											<!-- Check buttons -->
											<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
												<!-- Yes button -->
												<input type="radio" class="btn-check" name="btnradio" id="btnradio3">
												<label class="btn btn-outline-light btn-sm mb-0" for="btnradio3"><i class="far fa-thumbs-up me-1"></i>
													Yes</label>
												<!-- No button -->
												<input type="radio" class="btn-check" name="btnradio" id="btnradio4">
												<label class="btn btn-outline-light btn-sm mb-0" for="btnradio4"> No <i
														class="far fa-thumbs-down ms-1"></i></label>
											</div>
										</div>
									</div>
									<!-- Review helpful START -->
								</div>
							</div>
							<!-- Terms and Conditions content END -->
							<!-- Right side END -->
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection
@push('custom-script')
	<script src="{{ asset('assets/vendor/sticky-js/sticky.min.js') }}"></script>
@endpush
