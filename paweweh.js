function openCover(){
  document.getElementById('cover').classList.add('open');
  document.body.style.overflow='auto';
  startPetals();
}
document.body.style.overflow='hidden';

const target=new Date(pawewehData.akadTimestamp).getTime();
function tick(){
  const d=target-Date.now();
  if(d<0)return;
  const day=Math.floor(d/864e5),h=Math.floor(d%864e5/36e5),m=Math.floor(d%36e5/6e4),s=Math.floor(d%6e4/1000);
  cd_d.textContent=String(day).padStart(2,'0');
  cd_h.textContent=String(h).padStart(2,'0');
  cd_m.textContent=String(m).padStart(2,'0');
  cd_s.textContent=String(s).padStart(2,'0');
}
tick();setInterval(tick,1000);

const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('show');io.unobserve(e.target);}}),{threshold:.15});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

function startPetals(){
  const glyphs=['❀','✿','🌸','❁'];
  for(let i=0;i<16;i++){
    const p=document.createElement('div');
    p.className='petal';
    p.textContent=glyphs[i%glyphs.length];
    p.style.left=Math.random()*100+'vw';
    p.style.animationDuration=(8+Math.random()*10)+'s';
    p.style.animationDelay=(Math.random()*8)+'s';
    p.style.fontSize=(14+Math.random()*14)+'px';
    document.body.appendChild(p);
  }
}

let audioCtx=null,gamelanNodes=[],musicOn=false;
function toggleMusic(){
  musicOn=!musicOn;
  document.getElementById('musicBtn').textContent=musicOn?'❚❚':'♪';
  if(musicOn)playGamelan();else stopGamelan();
}
function playGamelan(){
  audioCtx=audioCtx||new (window.AudioContext||window.webkitAudioContext)();
  const scale=[261.6,293.7,349.2,392.0,440.0,523.3];
  function bell(){
    if(!musicOn)return;
    const f=scale[Math.floor(Math.random()*scale.length)];
    const o=audioCtx.createOscillator(),g=audioCtx.createGain();
    o.type='sine';o.frequency.value=f;
    g.gain.setValueAtTime(.12,audioCtx.currentTime);
    g.gain.exponentialRampToValueAtTime(.0001,audioCtx.currentTime+1.6);
    o.connect(g).connect(audioCtx.destination);
    o.start();o.stop(audioCtx.currentTime+1.6);
    gamelanNodes.push(o);
  }
  bell();
  window._gamelanTimer=setInterval(bell,1400);
}
function stopGamelan(){
  clearInterval(window._gamelanTimer);
  gamelanNodes.forEach(n=>{try{n.stop()}catch(e){}});
  gamelanNodes=[];
}

function sendRsvp(e){
  e.preventDefault();
  const fd=new FormData(e.target);
  const endpoint=pawewehData.rsvpEndpoint;
  if(endpoint){
    fetch(endpoint,{method:'POST',body:fd}).then(()=>showOk()).catch(showOk);
  }else showOk();
  function showOk(){e.target.style.display='none';document.getElementById('rsvpOk').style.display='block';}
}
