import requests
import json
import time
from datetime import datetime
from urllib.parse import urlencode, quote
import re
from dataclasses import dataclass
from typing import List, Dict, Optional
import logging

# Configure logging
logging.basicConfig(level=logging.INFO)
logger = logging.getLogger(__name__)

@dataclass
class LinkedInPost:
    """Data class for LinkedIn post information"""
    post_id: str
    author_name: str
    author_profile: str
    post_text: str
    post_url: str
    timestamp: str
    likes_count: int
    comments_count: int
    shares_count: int
    media_type: str
    media_urls: List[str]
    hashtags: List[str]
    mentions: List[str]
    engagement_rate: float

class LinkedInScraper:
    def __init__(self, cookies: str = None, headers: Dict = None):
        """
        Initialize LinkedIn scraper
        
        Args:
            cookies: LinkedIn session cookies (required for authenticated requests)
            headers: Custom headers for requests
        """
        self.session = requests.Session()
        
        # Default headers
        self.headers = {
            'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'Accept': 'application/json, text/plain, */*',
            'Accept-Language': 'en-US,en;q=0.9',
            'Accept-Encoding': 'gzip, deflate, br',
            'Connection': 'keep-alive',
            'Upgrade-Insecure-Requests': '1',
            'Sec-Fetch-Dest': 'document',
            'Sec-Fetch-Mode': 'navigate',
            'Sec-Fetch-Site': 'none',
            'Cache-Control': 'max-age=0'
        }
        
        if headers:
            self.headers.update(headers)
            
        if cookies:
            self.session.headers.update({'Cookie': cookies})
            
        self.session.headers.update(self.headers)
    
    def search_posts(self, niche_keywords: List[str], max_posts: int = 50) -> List[Dict]:
        """
        Search LinkedIn posts based on niche keywords
        
        Args:
            niche_keywords: List of keywords related to your niche
            max_posts: Maximum number of posts to scrape
            
        Returns:
            List of post dictionaries
        """
        all_posts = []
        
        for keyword in niche_keywords:
            try:
                posts = self._search_by_keyword(keyword, max_posts // len(niche_keywords))
                all_posts.extend(posts)
                time.sleep(2)  # Rate limiting
            except Exception as e:
                logger.error(f"Error searching for keyword '{keyword}': {str(e)}")
                continue
        
        return all_posts[:max_posts]
    
    def _search_by_keyword(self, keyword: str, limit: int) -> List[Dict]:
        """Search posts by specific keyword"""
        posts = []
        
        # LinkedIn search URL (this is a simplified example)
        search_url = f"https://www.linkedin.com/search/results/content/"
        
        params = {
            'keywords': keyword,
            'origin': 'GLOBAL_SEARCH_HEADER',
            'sid': 'search',
            'sortBy': 'date_posted'
        }
        
        try:
            response = self.session.get(search_url, params=params, timeout=10)
            response.raise_for_status()
            
            # Parse the response (this would need to be adapted based on actual LinkedIn API/HTML structure)
            posts_data = self._parse_search_results(response.text, limit)
            
            for post_data in posts_data:
                post_details = self._extract_post_details(post_data)
                if post_details:
                    posts.append(post_details)
                    
        except Exception as e:
            logger.error(f"Error in keyword search: {str(e)}")
            
        return posts
    
    def _parse_search_results(self, html_content: str, limit: int) -> List[Dict]:
        """Parse search results from HTML content"""
        # This is a placeholder - you'd need to implement actual HTML parsing
        # using BeautifulSoup or similar library based on LinkedIn's current structure
        
        # Example structure (you'd need to adapt this)
        posts = []
        
        # Simulate post extraction (replace with actual parsing logic)
        import random
        for i in range(min(limit, 10)):  # Simulate finding posts
            post = {
                'id': f'post_{i}_{random.randint(1000, 9999)}',
                'html': f'<div>Sample post content {i}</div>',
                'url': f'https://www.linkedin.com/posts/activity-{random.randint(1000000, 9999999)}-test'
            }
            posts.append(post)
            
        return posts
    
    def _extract_post_details(self, post_data: Dict) -> Optional[Dict]:
        """Extract detailed information from a post"""
        try:
            # This is a template - adapt based on actual LinkedIn structure
            post_details = {
                'post_id': post_data.get('id', ''),
                'author_name': self._extract_author_name(post_data),
                'author_profile': self._extract_author_profile(post_data),
                'post_text': self._extract_post_text(post_data),
                'post_url': post_data.get('url', ''),
                'timestamp': self._extract_timestamp(post_data),
                'likes_count': self._extract_likes_count(post_data),
                'comments_count': self._extract_comments_count(post_data),
                'shares_count': self._extract_shares_count(post_data),
                'media_type': self._extract_media_type(post_data),
                'media_urls': self._extract_media_urls(post_data),
                'hashtags': self._extract_hashtags(post_data),
                'mentions': self._extract_mentions(post_data),
                'engagement_rate': self._calculate_engagement_rate(post_data)
            }
            
            return post_details
            
        except Exception as e:
            logger.error(f"Error extracting post details: {str(e)}")
            return None
    
    def _extract_author_name(self, post_data: Dict) -> str:
        """Extract author name from post data"""
        # Implement based on LinkedIn's HTML structure
        return "Sample Author"
    
    def _extract_author_profile(self, post_data: Dict) -> str:
        """Extract author profile URL"""
        return "https://www.linkedin.com/in/sample-author"
    
    def _extract_post_text(self, post_data: Dict) -> str:
        """Extract post text content"""
        return "Sample post content about the niche topic"
    
    def _extract_timestamp(self, post_data: Dict) -> str:
        """Extract post timestamp"""
        return datetime.now().isoformat()
    
    def _extract_likes_count(self, post_data: Dict) -> int:
        """Extract likes count"""
        return 25  # Sample value
    
    def _extract_comments_count(self, post_data: Dict) -> int:
        """Extract comments count"""
        return 5  # Sample value
    
    def _extract_shares_count(self, post_data: Dict) -> int:
        """Extract shares count"""
        return 3  # Sample value
    
    def _extract_media_type(self, post_data: Dict) -> str:
        """Extract media type (image, video, document, etc.)"""
        return "text"  # Sample value
    
    def _extract_media_urls(self, post_data: Dict) -> List[str]:
        """Extract media URLs"""
        return []  # Sample value
    
    def _extract_hashtags(self, post_data: Dict) -> List[str]:
        """Extract hashtags from post"""
        text = self._extract_post_text(post_data)
        hashtags = re.findall(r'#\w+', text)
        return hashtags
    
    def _extract_mentions(self, post_data: Dict) -> List[str]:
        """Extract mentions from post"""
        text = self._extract_post_text(post_data)
        mentions = re.findall(r'@\w+', text)
        return mentions
    
    def _calculate_engagement_rate(self, post_data: Dict) -> float:
        """Calculate engagement rate"""
        likes = self._extract_likes_count(post_data)
        comments = self._extract_comments_count(post_data)
        shares = self._extract_shares_count(post_data)
        
        total_engagement = likes + comments + shares
        # Assuming average reach of 1000 (you'd need actual follower data)
        estimated_reach = 1000
        
        return (total_engagement / estimated_reach) * 100 if estimated_reach > 0 else 0
    
    def save_to_json(self, posts: List[Dict], filename: str = None):
        """Save posts to JSON file"""
        if filename is None:
            filename = f"linkedin_posts_{datetime.now().strftime('%Y%m%d_%H%M%S')}.json"
        
        output_data = {
            'scraped_at': datetime.now().isoformat(),
            'total_posts': len(posts),
            'posts': posts
        }
        
        with open(filename, 'w', encoding='utf-8') as f:
            json.dump(output_data, f, indent=2, ensure_ascii=False)
        
        logger.info(f"Saved {len(posts)} posts to {filename}")
        return filename

# Usage Example
def main():
    """Main function to demonstrate scraper usage"""
    
    # Initialize scraper
    # You'll need to provide actual LinkedIn cookies for authenticated requests
    scraper = LinkedInScraper(
        cookies="your_linkedin_cookies_here"  # Replace with actual cookies
    )
    
    # Define your niche keywords
    niche_keywords = [
        "artificial intelligence",
        "Ai Automation",
        "N8N",
        "AI Agent"
    ]
    
    # Search for posts
    print("Ai Automation, N8N, Ai Agent")
    posts = scraper.search_posts(niche_keywords, max_posts=100)
    
    # Save to JSON
    output_file = scraper.save_to_json(posts)
    print(f"Scraping completed! Results saved to: {output_file}")
    
    # Display sample results
    if posts:
        print("\nSample post:")
        print(json.dumps(posts[0], indent=2))

# Configuration class for easy customization
class ScrapingConfig:
    """Configuration class for scraping parameters"""
    
    def __init__(self):
        self.max_posts = 100
        self.delay_between_requests = 2
        self.timeout = 10
        self.output_format = "json"
        self.include_media = True
        self.include_comments = False
        self.date_range = None  # Format: ('2024-01-01', '2024-12-31')
        
    def to_dict(self):
        return {
            'max_posts': self.max_posts,
            'delay_between_requests': self.delay_between_requests,
            'timeout': self.timeout,
            'output_format': self.output_format,
            'include_media': self.include_media,
            'include_comments': self.include_comments,
            'date_range': self.date_range
        }

if __name__ == "__main__":
    main()